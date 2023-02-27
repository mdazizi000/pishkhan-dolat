<?php

namespace Modules\Site\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends  FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'phone'=>['required','regex:/(09)[0-9]{9}/','digits:11','numeric'            ]

            'password' => 'required|min:8',
            'confirm_password' => 'required',
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
            'password.required' => 'فیلد رمزعبور الزامی می باشد',
            'password.min' => ' رمزعبور نمی تواند کمتر از 8 کاراکتر باشد',
            'confirm_password.required' => 'فیلد تکرار رمزعبور الزامی می باشد',
        ];
    }
}