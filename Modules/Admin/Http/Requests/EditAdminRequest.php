<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditAdminRequest extends FormRequest
{    /**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
    public function rules()
    {
        return [

            'name'=>'required|min:3',
            'phone'=>'required|min:11|max:11',
        ];
    }

    public function messages()
    {
        return [
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
