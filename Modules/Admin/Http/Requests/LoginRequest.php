<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
//            'captcha'=>'required|captcha',
            'password'=>'required|min:3|max:199'
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


    public function messages()
    {
        return [
            'email.required'=>'فیلد ایمیل الزامی می باشد',
            'email.email'=>'ایمیل وارد شده معتبر نمی باشد',
            'captcha.required'=>'فیلد کد امنیتی الزامی می باشد',
            'captcha.captcha'=>'کد امنیتی وارد شده معتبر نمی باشد',
            'password.required'=>'رمز عبور الزامی می باشد',
            'password.min'=>'رمز عبور وارد شده کوچک تر از حد مجاز می باشد ',
            'password.max'=>'رمز عبور وارد شده بزرگ تر از ححد مجار می باشد',

        ];
    }
}
