<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepairFabricsRequest extends FormRequest
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
            'delivery_date' => 'required',
            'payment'=>'required',
            'repair' => 'required',
            'number_repairs' => 'required',

        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'يرجى ادخال اسم العميل ',
            'delivery_date.required' => 'يرجى ادخال تاريخ الستلام  ',
               'value.required'=>'يرجى ادخال القيمة   ',
            'payment.required'=>'يرجى ادخال طريقة الدفع',
            'repair.required'=>'يرجى ادخال التصليحات المطلوبة ',
            'number_repairs.required'=>'يرجى ادخال عدد الثياب مطلوب تصليحها ',



        ];
    }
}
