<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Modules\Site\Entities\Office;
use Livewire\WithFileUploads;

class RegisterOfficeComponent extends Component
{
    use WithFileUploads;

    public $office_code ;
    public $office_type ;
    public $office_details ;
    public $first_name ;
    public $last_name ;
    public $national_card_series ;
    public $national_code ;
    public $father_name ;
    public $phone ;
    public $birth_certificate_number ;
    public $birth_certificate_series ;
    public $birth_certificate_serial ;
    public $birthday ;
    public $province ;
    public $city ;
    public $address ;
    public $postal_code ;
    public $mobile ;
    public $has_card_reader ;
    public $bank ;
    public $account_number ;
    public $iban ;
    public $captcha ;
    public $tax_code ;
    public $description ;
    public $office_permit ;
    public $national_card ;
    public $national_card_back ;
    public $bank_account ;
    public $commitment_letter ;
    protected $rules = [
        'office_code'=>'required',
        'office_type'=>'required|in:1,2',
        'office_details'=>'required|in:1,2',
        'first_name'=>'required|min:3',
        'last_name'=>'required|min:3',
        'national_card_series'=>'required',
        'national_code'=>'required|numeric',
        'father_name'=>'required|min:3',
        'phone'=>'required',
        'birth_certificate_number'=>'required|numeric',
        'birth_certificate_series'=>'required',
        'birth_certificate_serial'=>'required',
        'birthday'=>'required|date',
        'province'=>'required',
        'city'=>'required',
        'address'=>'required',
        'postal_code'=>'required|digits:10',
        'mobile'=>'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:offices,mobile',
        'has_card_reader'=>'required|boolean',
        'bank'=>'required',
        'captcha'=>'required|captcha',
        'account_number'=>'required|numeric',
        'iban'=>'required|min:24|max:24',
        'tax_code'=>'required',
        'office_permit'=>'required|image',
        'national_card'=>'required|image',
        'national_card_back'=>'required|image',
        'bank_account'=>'required|image',
        'commitment_letter'=>'required|image',
    ];

    public function render()
    {
        $provinces = DB::table('provinces')->select(['name'])->get();
        $cities = DB::table('cities')->select(['name'])->get();
        return view('livewire.register-office-component',compact('provinces','cities')) ->layout('layouts.app');

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages=[
        'office_code.required'=>'کد دفتر پیشخوان الزامی می باشد',
        'office_type.required'=>'فیلد نوع دفتر الزامی می باشد',
        'office_type.in'=>'نوع دفتر وارد شده معتبر نمی باشد',
        'office_details.required'=>'فیلد مشخصات دفتر الزامی میباشد',
        'office_details.in'=>'فیلد مشخصات دفتر معتبر نمی باشد',
        'first_name.required'=>'فیلد نام الزامی می باشد',
        'first_name.min'=>'فیلد نام نباید کمتر از 3 کاراکتر باشد',
        'last_name.required'=>'فیلد نام خانوادگی الزامی می باشد',
        'last_name.min'=>'فیلد نام خانوادگی نباید کمتر از 3 کاراکتر باشد',
        'national_card_series.required'=>'فیلد سریال کارت ملی الزامی میباشد',
        'national_card_series.min'=>'فیلد سریال کار ملی باید 10 رقم باشد',
        'national_card_series.max'=>'فیلد سریال کار ملی باید 10 رقم باشد',
        'national_code.required'=>'کد ملی الزامی می باشد',
        'national_code.numeric'=>'کد ملی معتبر نمی باشد',
        'father_name.required'=>'نام پدر الزامی می باشد',
        'father_name.min'=>'فیلد نام پدر نباید کمتر از 3 کاراکتر باشد',
        'phone.required'=>'فیلد تلفن ثابت الزامی می باشد',
        'phone.regex'=>'تلفن ثابت معتبر نمی باشد',
        'birth_certificate_number.required'=>'فیلد شماره شناسنامه الزامی می باشد',
        'birth_certificate_number.numeric'=>'فیلد شماره شناسنامه معتبر نمی باشد',
        'birth_certificate_series.required'=>'فیلد سری شناسنامه الزامی می باشد',
        'birth_certificate_serial.required'=>'فیلد سریال شناسنامه الزامی می باشد',
        'birthday.required'=>'فیلد تاریخ تولد الزامی می باشد',
        'birthday.date'=>'فیلد تارایخ تولد معتبر نمی باشد',
        'province.required'=>'فیلد استان الزامی می باشد',
        'city.required'=>'فیلد شهر الزامی می باشد',
        'address.required'=>'فیلد آدرس الزامی میباشد',
        'postal_code.required'=>'کد پستی الزامی می باشد',
        'postal_code.digits'=>'کد پستی باید 10 رقم باشد',
        'mobile.required'=>'فیلد شماره همراه الزامی می باشد',
        'mobile.regex'=>'شماره همراه وارد شده معتبر نمی باشد',
        'mobile.digits'=>'شماره همراه نمی تواند منتر از 11 رقم باشد',
        'mobile.numeric'=>'شماره همراه معتبر نمی باشد',
        'mobile.unique'=>'شماره همراه وارد شده تکراری می باشد',
        'bank.required'=>'فیلد نام بانک الزامی می باشد',
        'account_number.required'=>'فیلد شماره حساب الزامی می باشد',
        'account_number.numeric'=>'شماره حساب معتبر نمی باشد',
        'captcha.captcha'=>'فیلد کد امنیتی الزامی می باشد',
        'captcha.required'=>'کد امنیتی معتبر نیست',
        'iban.required'=>'فیلد شماره شبا الزامی می باشد',
        'iban.min'=>'شماره شبا باید 24 رقم باشد',
        'iban.max'=>'شماره شبا باید 24 رقم باشد',
        'tax_code.required'=>'فیلد کد رهگیری مالیاتی الزامی می باشد',
        'office_permit.required'=>'تصویر پروانه دفتر الزامی می باشد',
        'office_permit.image'=>'تصویر پروانه دفتر معتبر نمی باشد',
        'national_card.required'=>'تصویر کارت ملی الزامی می باشد',
        'national_card.image'=>'تصویر کارت ملی معتبر نمی باشد',
        'national_card_back.required'=>'تصویر حساب بانکی الزامی می باشد',
        'national_card_back.image'=>'تصویر حساب بانکی معتبر نمی باشد',
        'bank_account.required'=>'تصویر پشت کرات ملی الزامی می باشد',
        'bank_account.image'=>'تصویر پشت کرات ملی معتبر نمی باشد',
        'commitment_letter.required'=>'تصویر تعهد نامه الزامی می باشد',
        'commitment_letter.image'=>'تصویر تعهد نامه ممعتبر نمی باشد',

    ];
    public function store(Request $request)
    {
        $request->validate($this->rules,$this->messages);
        //office_permit
        $office_permit_image = $this->office_permit;
        $office_permit_name = $this->office_permit->hashName();
        $office_permit_path = '/images/office_permit/';
        Storage::putFileAs($office_permit_path, $office_permit_image, $office_permit_name);

        //national_card
        $national_card_image = $this->national_card;
        $national_card_name = $this->national_card->hashName();
        $national_card_path = '/images/national_card/';
        Storage::putFileAs($national_card_path, $national_card_image, $national_card_name);

        //national_card_back
        $national_card_back_image = $this->national_card_back;
        $national_card_back_name = $this->national_card_back->hashName();
        $national_card_back_path = '/images/national_card_back/';
        Storage::putFileAs($national_card_back_path, $national_card_back_image, $national_card_back_name);

        //bank_account
        $bank_account_image = $this->bank_account;
        $bank_account_name = $this->bank_account->hashName();
        $bank_account_path = '/images/bank_account/';
        Storage::putFileAs($bank_account_path, $bank_account_image, $bank_account_name);

        //commitment_letter
        $commitment_letter_image = $this->commitment_letter;
        $commitment_letter_name = $this->commitment_letter->hashName();
        $commitment_letter_path = '/images/commitment_letter/';
        Storage::putFileAs($commitment_letter_path, $commitment_letter_image, $commitment_letter_name);

        $data = [
            'status' => 1,
            'office_code' => $this->office_code,
            'office_type' => $this->office_type,
            'office_details' => $this->office_details,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'national_card_series' => $this->national_card_series,
            'national_code' => $this->national_code,
            'father_name' => $this->father_name,
            'phone' => $this->phone,
            'birth_certificate_number' => $this->birth_certificate_number,
            'birth_certificate_series' => $this->birth_certificate_series,
            'birth_certificate_serial' => $this->birth_certificate_serial,
            'birthday' => $this->birthday,
            'province' => $this->province,
            'city' => $this->city,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'mobile' => $this->mobile,
            'has_card_reader' => $this->has_card_reader,
            'bank' => $this->bank,
            'account_number' => $this->account_number,
            'iban' => $this->iban,
            'tax_code' => $this->tax_code,
            'description' => $this->description,
            'office_permit' => $office_permit_path . '' . $office_permit_name,
            'national_card' => $national_card_path . '' . $national_card_name,
            'national_card_back' => $national_card_back_path . '' . $national_card_back_name,
            'bank_account' => $bank_account_path . '' . $bank_account_name,
            'commitment_letter' => $commitment_letter_path . '' . $commitment_letter_name,
        ];
        $office = Office::query()->create($data);

        return redirect()->to('/')->with(['message' => 'ثبت نام با موفقیت انجام شد. وارد شوید']);
    }
}
