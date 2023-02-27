<?php

namespace Modules\Stock\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyStockRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'buy_type'=>'required|in:1,2'
        ];
    }

    public function messages()
    {
        return[
            'buy_type.required'=>'فیلد نوع خرید الزامی می باشد',
            'buy_type.in'=>'نوع خرید معتبر نمی باشد',
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
