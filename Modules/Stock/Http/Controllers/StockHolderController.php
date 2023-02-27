<?php

namespace Modules\Stock\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Stock\Entities\SoldStock;
use Modules\Stock\Entities\StockHolder;
use Modules\Stock\Http\Requests\BuyStockRequest;
use Cryptommer\Smsir\Smsir;

class StockHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('stock::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
//        return  phpinfo();
        return view('stock::buystock');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BuyStockRequest $request)
    {
        if (auth()->guard('stock')->check()){
            $stock_holder=auth()->guard('stock')->user();
            $unpaid=SoldStock::query()->where('stock_holder_id',$stock_holder->id)
                ->where('status',false)
                ->first();
            if ($unpaid){
                $message = 'شما یک صورتحساب پرداخت نشده دارید و امکان خرید مجدد وجود ندارد';
                return redirect()->back()->withErrors(['msg'=>$message]);
            }
            $price=$request->buy_type == '1' ? 1000000 : 200000;

            $data=[
                'buy_type'=>$request->buy_type,
                'price'=>$price,
                'status'=>false,
                'due_date'=>Carbon::now()
            ];
            $stock=$stock_holder->stocks()->create($data);
            if ($request->buy_type == '2'){
                $date=Carbon::now();
                for ($i=0;$i < 4 ; $i++){
                    $date->addMonth(1);
                    $data=[
                        'main_id'=>$stock->id,
                        'buy_type'=>$request->buy_type,
                        'price'=>200000,
                        'status'=>false,
                        'due_date'=>$date
                    ];
                    $stock_holder->stocks()->create($data);

                }
            }

            $link=payment()->gateway($stock->id,$price,$stock_holder);
        }
        else{
            $rules=[
                'office_code'=>'required|unique:stock_holders,office_code',
                'first_name'=>'required|min:3',
                'last_name'=>'required|min:3',
                'national_code'=>'required|min:10|max:10|unique:stock_holders,national_code',
                'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:stock_holders,phone',
                'gender'=>'required|in:1,2'
            ];
            $messages=[
                'office_code.required'=>'فیلد کد دفتر پیشخوان الزامی می باشد',
                'office_code.unique'=>'کد دفتر پیشخوان تکراری باشد',
                'first_name.required'=>'نام الزامی می باشد',
                'first_name.min'=>'نام نمی تواند کمتر از 3 کاراکتر باشد',
                'last_name.required'=>'نام خانوادگی الزامی می باشد',
                'last_name.min'=>'نام خانوادگی نمی تواند کمتر از 3 کاراکتر  باشد',
                'national_code.required'=>'فیلد کد ملی الزامی می باشد',
                'national_code.unique'=>'کد ملی تکراری باشد',
                'national_code.min'=>'کدملی باشد 10 رقم باشد',
                'national_code.max'=>'کدملی باشد 10 رقم باشد',
                'phone.required'=>'فیلد شماره همراه الزامی می باشد',
                'phone.regex'=>'شماره همراه وارد شده معتبر نمی باشد',
                'phone.digits'=>'شماره همراه نمی تواند منتر از 11 رقم باشد',
                'phone.numeric'=>'شماره همراه معتبر نمی باشد',
                'phone.unique'=>'شماره همراه وارد شده تکراری می باشد',
                'gender.required'=>'فیلد جنسیت الزامی می باشد',
                'gender.in'=>'جنسیت وازد شده معتبر نمی باشد'
            ];
            $validate=$request->validate($rules,$messages);
            $stock_holder=new StockHolder();
            $stock_holder->office_code=$request->office_code;
            $stock_holder->first_name=$request->first_name;
            $stock_holder->last_name=$request->last_name;
            $stock_holder->national_code=$request->national_code;
            $stock_holder->phone=$request->phone;
            $stock_holder->gender=$request->gender;
            $stock_holder->save();

            $data=[
                'buy_type'=>$request->buy_type,
                'price'=>$request->buy_type == '1' ? 1000000 : 200000,
                'status'=>false,
                'due_date'=>Carbon::now()
            ];
            $price=1000000;
            $stock=$stock_holder->stocks()->create($data);
            if ($request->buy_type == '2'){
                $price=200000;
                $date=Carbon::now();
                for ($i=0;$i < 4 ; $i++){
                    $date->addMonth(1);
                    $data=[
                        'main_id'=>$stock->id,
                        'buy_type'=>$request->buy_type,
                        'price'=>200000,
                        'status'=>false,
                        'due_date'=>$date
                    ];
                    $stock_holder->stocks()->create($data);

                }
            }
            $link=payment()->gateway($stock->id,$price,$stock_holder);
        }
        return redirect()->to($link);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('stock::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('stock::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function verify(Request $request)
    {
        return payment()->verifyPayment($request);
    }

    public function loginPage()
    {
        if (auth()->guard('stock')->check()){
            return  redirect()->route('profile.stock');
        }
        return view('stock::login');
    }

    public function sendOtp(Request $request)
    {
        $rules=[
            'phone'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|exists:stock_holders,phone',
        ];
        $messages=[
            'phone.required'=>'فیلد شماره همراه الزامی می باشد',
            'phone.regex'=>'شماره همراه وارد شده معتبر نمی باشد',
            'phone.digits'=>'شماره همراه نمی تواند منتر از 11 رقم باشد',
            'phone.numeric'=>'شماره همراه معتبر نمی باشد',
            'phone.exists'=>'لطفا ابتدا ثبت نام کنید',
        ];
        $validate=$request->validate($rules,$messages);
        $check=StockHolder::query()->where('phone',$request->phone)->first();
        if (!$check){
            $message = 'شماره مورد نظر موجود نمی باشد';
            return redirect()->back()->withErrors(['msg' => $message]);
        }
        $code=rand(1111,9999);
        $check_otp=Cache::get($request->phone);
        if ($check_otp == 5644){
            $message="تا 2دقیقه آینده امکان ارسال کد نمی باشد";

            return redirect()->back()->withErrors(['msg' => $message]);
        }
        else {

            Cache::put($request->phone, $code, 120);
            
        }
        $phone=$request->phone;

        /**
         *
         * @required $name string
         * @required $value string
         */
        $send = smsir::Send();
        $parameter = new \Cryptommer\Smsir\Objects\Parameters('code', $code);
        $parameters = array($parameter) ;
        /**
         * @required string $mobile
         * @required int $templateId
         * @required Parameters[] $parameters
         * @returns VerifyResponse
         */
        $send->Verify($phone, 586193, $parameters);
        return  redirect()->route('stockholder.getCode')->with(['phone'=>$phone]);
        
    }

    public function verifyOtpPage()
    {
        return view('stock::get-code');
    }

    public function verifyOtp(Request $request)
    {
        $phone=$request->phone;
        $check_otp=Cache::get($phone);
        if ($check_otp == $request->code){
            $user_check=StockHolder::query()->where('phone',$phone)->first();
            if ($user_check){
                auth()->guard('stock')->login($user_check);
                return  redirect()->route('profile.stock');
            }
            else{
                $message="شماره همراه معتبر نمی باشد";
                return redirect()->back()->withErrors(['msg' => $message]);
            }
        }
        else{
            $message="کد وارد شده معتبر نمی باشد";
            return redirect()->back()->withErrors(['msg' => $message]);
        }
    }

    public function invoice($id)
    {
        $data=SoldStock::query()->where('id',$id)->first();
        if (!$data){
            $message='فاکتور مورد نظر یافت نشد';
            return view('stock::invoice')->withErrors(['msg' => $message]);
        }
        return view('stock::invoice',compact('data'));
    }

    public function profile()
    {
        return view('stock::profile');
    }
}
