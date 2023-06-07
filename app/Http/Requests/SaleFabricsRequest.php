<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleFabricsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'value' => 'required',
            'quantity_sold' => 'required',
            'payment'=>'required'

        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'يرجى ادخال اسم القماش ',
            'quantity_sold.required' => 'يرجى ادخال عدد امتار ',
               'value.required'=>'يرجى ادخال سعر   ',
            'payment.required'=>'يرجى ادخال طريقة الدفع'



        ];
    }
}
