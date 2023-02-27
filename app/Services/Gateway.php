<?php

namespace App\Services;

use Modules\Stock\Entities\SoldStock;
use Modules\Stock\Entities\StockHolder;
use Modules\Stock\Entities\Transaction;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;


class Gateway
{

    public static function use(): Gateway
    {
        return new static();
    }

    /**
     * @param $data
     * @param $user
     */
    public function gateway($stockId, $price, $user)
    {
        try {
            $invoice = new Invoice();

            $invoice->amount($price);
            $transaction = new Transaction();
            $payment_id = md5(uniqid());
            $payment = Payment::callbackUrl("http://127.0.0.1:8000/verify?paymentId=" . $payment_id);
            $payment->config("description", "پرداخت صورتحساب");


            $payment->purchase($invoice, function ($driver, $transactionId) use ($stockId, $price, $transaction, $payment_id, $user) {
                $transaction->create([
                    'stock_holder_id' => $user->id,
                    'sold_stock_id' => $stockId,
                    'payment_id' => $payment_id,
                    'transaction_id' => $transactionId,
                    'status' => Transaction::TRANSACTION_UNPAID,
                    'amount' => $price
                ]);
            });

            return  $payment->pay()->getAction();
        } catch (\Exception $exception) {
            $transaction = new Transaction();
            $transaction->create([
                'stock_holder_id' => $user->id,
                'sold_stock_id' => $stockId,
                'payment_id' => $payment_id,
                'status' => Transaction::TRANSACTION_FAILED,
                'amount' => $price
            ]);
            $message=$exception->getMessage();
            return redirect()->route('buy.stock')->withErrors(['msg'=>$message]);

        }
    }

    public function verifyPayment($request)
    {
        if ($request->missing('paymentId')) {
            $status = 0;
            $message="تراکنش باخطا مواجه شد دوباره امتحان کنید";
            return redirect()->route('buy.stock')->withErrors(['msg'=>$message]);
        }
        $transaction = Transaction::query()->where('payment_id', $request->paymentId)->first();
        if (!$transaction) {
            $status = 0;
            $message="تراکنش یافت نشد";
            return redirect()->route('buy.stock')->withErrors(['msg'=>$message]);
        }


        try {
            $receipt = Payment::amount($transaction->amount)
                ->transactionId($transaction->transaction_id)
                ->verify();
            $transaction->status = Transaction::TRANSACTION_SUCCESS;
            $transaction->ref_id = $receipt->getReferenceId();
            $transaction->save();
            if ($transaction) {
               $sold_stock=SoldStock::query()->where('id',$transaction->sold_stock_id)->first();
               $sold_stock->status=true;
               $sold_stock->save();
               $holder=StockHolder::query()->where('id',$transaction->stock_holder_id)->first();
               auth()->guard('stock')->login($holder);
            }

            $status = 1;
            $reference_id = $receipt->getReferenceId();
            $stockId=$sold_stock->id;
            return view('stock::payback', compact('status', 'reference_id','stockId'));
//            return successResponse(['ref_id' => $receipt->getReferenceId()]);
        }
        catch (\Exception $exception) {
            if ($exception->getCode() <= 0) {
                $transaction->status = Transaction::TRANSACTION_FAILED;
                $transaction->save();
                $status = $exception->getCode();
                return view('stock::payback', compact('status'));
//                return  failedResponse($exception->getMessage(),$exception->getCode());
            }

        }
    }
}