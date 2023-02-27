<?php

namespace Modules\Site\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\Banner;
use Modules\Site\Entities\Office;
use Modules\Site\Entities\OfficeUser;
use Modules\Site\Http\Requests\ChangePasswordRequest;
use Modules\Site\Http\Requests\RegisterOfficeRequest;
use Modules\Site\Http\Requests\SendOtpRequest;
use Cryptommer\Smsir\Smsir;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('site::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('site::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(RegisterOfficeRequest $request)
    {
        //office_permit
        $office_permit_image = $request->office_permit;
        $office_permit_name = $request->office_permit->hashName();
        $office_permit_path = '/images/office_permit/';
        Storage::putFileAs($office_permit_path, $office_permit_image, $office_permit_name);

        //national_card
        $national_card_image = $request->national_card;
        $national_card_name = $request->national_card->hashName();
        $national_card_path = '/images/national_card/';
        Storage::putFileAs($national_card_path, $national_card_image, $national_card_name);

        //national_card_back
        $national_card_back_image = $request->national_card_back;
        $national_card_back_name = $request->national_card_back->hashName();
        $national_card_back_path = '/images/national_card_back/';
        Storage::putFileAs($national_card_back_path, $national_card_back_image, $national_card_back_name);

        //bank_account
        $bank_account_image = $request->bank_account;
        $bank_account_name = $request->bank_account->hashName();
        $bank_account_path = '/images/bank_account/';
        Storage::putFileAs($bank_account_path, $bank_account_image, $bank_account_name);

        //commitment_letter
        $commitment_letter_image = $request->commitment_letter;
        $commitment_letter_name = $request->commitment_letter->hashName();
        $commitment_letter_path = '/images/commitment_letter/';
        Storage::putFileAs($commitment_letter_path, $commitment_letter_image, $commitment_letter_name);

        $data = [
            'status' => 2,
            'office_code' => $request->office_code,
            'office_type' => $request->office_type,
            'office_details' => $request->office_details,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_card_series' => $request->national_card_series,
            'national_code' => $request->national_code,
            'father_name' => $request->father_name,
            'phone' => $request->phone,
            'birth_certificate_number' => $request->birth_certificate_number,
            'birth_certificate_series' => $request->birth_certificate_series,
            'birth_certificate_serial' => $request->birth_certificate_serial,
            'birthday' => $request->birthday,
            'province' => $request->province,
            'city' => $request->city,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'mobile' => $request->mobile,
            'has_card_reader' => $request->has_card_reader,
            'bank' => $request->bank,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'tax_code' => $request->tax_code,
            'description' => $request->description,
            'office_permit' => $office_permit_path . '' . $office_permit_name,
            'national_card' => $national_card_path . '' . $national_card_name,
            'national_card_back' => $national_card_back_path . '' . $national_card_back_name,
            'bank_account' => $bank_account_path . '' . $bank_account_name,
            'commitment_letter' => $commitment_letter_path . '' . $commitment_letter_name,
        ];
        $office = Office::query()->create($data);

        return redirect()->to('/')->with(['message' => 'ثبت نام با موفقیت انجام شد. وارد شوید']);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('site::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('site::edit');
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

    public function registerPage()
    {
        $provinces = DB::table('provinces')->select(['name'])->get();
        $cities = DB::table('cities')->select(['name'])->get();
        return view('site::office.register', compact('provinces', 'cities'));
    }

    public function sendOtp(SendOtpRequest $request)
    {

        $check = Office::query()->where('mobile', $request->phone)->first();
        if (!$check) {
            $check = OfficeUser::query()->where('phone', $request->phone)->first();
            if (!$check) {
                $message = 'لطفا ابتدا ثبت نام کنید';
                return redirect()->back()->withErrors(['msg' => $message]);
            }
        }
        elseif ($check instanceof  Office && $check->status !== Office::CONFIRMED){
            $message = 'حساب شما تایید نشده است.پس از تایید حساب دوباره امتحان کنید';
            return redirect()->back()->withErrors(['msg' => $message]);
        }
        $code = rand(1111, 9999);
        if ($check instanceof Office) {
            $check_otp = Cache::get('office_' . $request->phone);
        }
        else {
            $check_otp = Cache::get('officeUser_' . $request->phone);
        }
        if ($check_otp == 5644) {
            $message = "تا 2دقیقه آینده امکان ارسال کد نمی باشد";

            return redirect()->back()->withErrors(['msg' => $message]);
        }
        else {
            if ($check instanceof Office) {

                Cache::put('office_'.$request->phone, $code, 120);
            } else {
                Cache::put('officeUser_'.$request->phone, $code, 120);
            }

        }
        $phone = $request->phone;
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

        return redirect()->route('office.getCode')->with([ 'phone' => $phone]);
    }

    public function verifyOtpPage()
    {
        return view('site::office.get-code');
    }

    public function passLogin()
    {
        return view('site::office.login');
    }

    public function login(Request $request)
    {
        $rules=[
            'username'=>'required:min:11,max:11',
            'password'=>'required:min:8',
        ];
        $messages=[
            'username.required'=>'نام کاربری الزامی می باشد',
            'username.min'=>'نام باید 11 کاراکتر باشد',
            'username.max'=>'نام کاربری باید 11 کاراکتر باشد',
            'password.required'=>'رمزعبور الزامی می باشد',
            'password.min'=>'رمزعبور نمی تواند کمتر از 8 کاراکتر باشد',
        ];
        $request->validate($rules,$messages);
        $office=Office::query()->where('username',$request->username)->first();
        if (!$office){
            return redirect()->back()->withErrors(['msg'=>'اطلاعات وارد شده معتبر نیست']);
        }
        elseif ($office && $office->status !== Office::CONFIRMED){
            return redirect()->back()->withErrors(['msg'=>'حساب کاربری شما هنوز تایید نشده است']);
        }
        elseif (!Hash::check($request->password,$office->password)){
            return redirect()->back()->withErrors(['msg'=>'اطلاعات وارد شده معتبر نیست']);
        }
        auth()->guard('office')->login($office);
        return redirect()->route('office.dashboard');
    }
    public function verifyOtp(Request $request)
    {
        $phone = $request->phone;
        $office_check_otp = Cache::get('office_'.$phone);
        $office_user_check_otp = Cache::get('officeUser_'.$phone);
        if ($office_check_otp && $office_check_otp == $request->code){
            $user_check = Office::query()->where('mobile', $phone)->first();
        }
        elseif ($office_user_check_otp && $office_user_check_otp == $request->code){
            $user_check = OfficeUser::query()->where('phone', $phone)->first();
        }
        else {
            $message = "کد وارد شده معتبر نمی باشد";
            return redirect()->back()->withErrors(['msg' => $message]);
        }

        if ($user_check) {
            if ($user_check instanceof Office){
                auth()->guard('office')->login($user_check);
            }
            else{
                auth()->guard('officeUser')->login($user_check);
            }
            return redirect()->route('office.dashboard');
        }
        else {
            $message = "شماره همراه معتبر نمی باشد";
            return redirect()->back()->withErrors(['msg' => $message]);
        }
    }

    public function dashboard()
    {
        $banner = Banner::query()->where('active', true)->first();
        return view('site::office.dashboard', compact('banner'));
    }

    public function submitUser(Request $request)
    {
        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'national_code' => 'required|numeric',
            'job' => 'required',
            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:offices,mobile|unique:office_users,phone',
        ];

        $messages = [
            'first_name.required' => 'فیلد نام الزامی می باشد',
            'first_name.min' => 'فیلد نام نباید کمتبر از 3 کاراکتر باشد',
            'last_name.required' => 'فیلد نام خانوادگی الزامی می باشد',
            'last_name.min' => 'فیلد نام خانوادگی نباید کمتر از 3 کاراکتر باشد',
            'national_code.required' => 'کد ملی الزامی می باشد',
            'national_code.numeric' => 'کد ملی معتبر نمی باشد',
            'phone.required' => 'فیلد شماره همراه الزامی می باشد',
            'phone.regex' => 'شماره همراه وارد شده معتبر نمی باشد',
            'phone.digits' => 'شماره همراه نمی تواند منتر از 11 رقم باشد',
            'phone.numeric' => 'شماره همراه معتبر نمی باشد',
            'phone.unique' => 'شماره همراه وارد شده تکراری می باشد',
        ];
        $request->validate($rules, $messages);
        $data = [
            'office_id' => auth()->guard('office')->user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'national_code' => $request->national_code,
            'job' => $request->job,
            'phone' => $request->phone,
        ];

        OfficeUser::query()->create($data);

        return redirect()->route('office.dashboard')->with(['message' => 'عملیات با موفقیت انجام شد']);

    }

    public function changePasswordPage()
    {
        return view('site::office.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        if($request->password !== $request->confirm_password){
            return redirect()->back()->withErrors(['msg'=>"رمزعبور وو تکرار رمز عبور باهم برابر نیستند"]);
        }
        $office=Office::query()->where('id',auth()->guard('office')->user()->id)->first();
        $office->password=Hash::make($request->password);
        $office->save();
        return redirect()->back()->with(['message'=>"عملیات با موفقیت انجام شد"]);
    }
}
