<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sellDressRequest extends FormRequest
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
            'count' => 'required',
            'value' => 'required',
            'dresslength' => 'required',
            'dressExpand' => 'required',
            'payment'=>'required'

        ];
    }
    public function messages()
    {
        return[
            'count.required' => 'يرجى ادخال عدد الثياب ',
            'dresslength.required' => 'يرجى ادخال طول الثوب ',
            'dressExpand.required' => 'يرجى ادخال وسع الثوب ',
               'value.required'=>'يرجى ادخال سعر   ',
            'payment.required'=>'يرجى ادخال طريقة الدفع'



        ];
    }
}
