<?php

namespace Modules\Site\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendOtpRequest extends FormRequest
{    /**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
    public function rules()
    {
        return [
//            'phone'=>['required','regex:/(09)[0-9]{9}/','digits:11','numeric'            ]

            'phone' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric',
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
            'phone.required' => 'فیلد شماره همراه الزامی می باشد',
            'phone.regex' => 'شماره همراه وارد شده معتبر نمی باشد',
            'phone.digits' => 'شماره همراه نمی تواند منتر از 11 رقم باشد',
            'phone.numeric' => 'شماره همراه معتبر نمی باشد',
            'phone.exists' => 'شماره همراه وارد شده وجود ندارد',
        ];
    }
}
