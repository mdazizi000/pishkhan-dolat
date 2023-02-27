<?php

namespace Modules\Site\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterOfficeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
            'account_number'=>'required|numeric',
            'iban'=>'required|min:24|max:24',
            'tax_code'=>'required',
            'office_permit'=>'required|image',
            'national_card'=>'required|image',
            'national_card_back'=>'required|image',
            'bank_account'=>'required|image',
            'commitment_letter'=>'required|image',
        ];
    }

    public function messages()
    {
        return [
            'office_code.required'=>'کد دفتر پیشخوان الزامی می باشد',
            'office_type.required'=>'فیلد نوع دفتر الزامی می باشد',
            'office_type.in'=>'نوع دفتر وارد شده معتبر نمی باشد',
            'office_details.required'=>'فیلد مشخصات دفتر الزامی میباشد',
            'office_details.in'=>'فیلد مشخصات دفتر معتبر نمی باشد',
            'first_name.required'=>'فیلد نام الزامی می باشد',
            'first_name.min'=>'فیلد نام نباید کمتبر از 3 کاراکتر باشد',
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
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
