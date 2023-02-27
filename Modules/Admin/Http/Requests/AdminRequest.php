<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|unique:admins,email',
            'name'=>'required|min:3',
            'phone'=>'required|min:11|max:11',
            'password'=>'required|min:3|max:199'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'فیلد ایمیل الزامی می باشد',
            'email.email'=>'ایمیل وارد شده معتبر نمی باشد',
            'email.unique'=>'ایمیل وارد شده تکراری می باشد',
            'password.required'=>'رمز عبور الزامی می باشد',
            'password.min'=>'رمز عبور وارد شده کوچک تر از حد مجاز می باشد ',
            'password.max'=>'رمز عبور وارد شده بزرگ تر از ححد مجار می باشد',
            'phone.required'=>'شماره همراه الزامی می باشد',
            'phone.min'=>'شماره همراه باید 11 رقم باشد',
            'phone.max'=>'شماره همراه باید 11 رقم باشد',
            'name.required'=>'شماره همراه الزامی می باشد',
            'name.min'=>'فیلد نام و نام خانوادگی نمیتواند کمتر از 3 کاراکتر  باشد',

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
