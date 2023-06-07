<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FabricsRequest extends FormRequest
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
            'invoices_purchases_id' => 'required|max:255',
            'code' => 'required|max:255',
            'supplier_id' => 'required',
            'name' => 'required',
            'mark' => 'required',
            'energies' => 'required',
            'balance_yard' => 'required',
            'rate_tax' => 'required',
            'receivedamount' => 'required',
            'color' => 'required',

        ];
    }
    public function messages()
    {
        return[
            'invoices_purchases_id.required' => 'يرجى ادخال رقم الفاتورة',
            'code.required' => 'يرجى ادخال كود القماش',
            'name.required' => 'يرجى ادخال اسم القماش التعين',
            'mark.required' => 'يرجى اختيار نوع الصناعة',
            'energies.required' => 'يرجى ادخال عدد الطاقات ',
               'balance_yard.required'=>'يرجى ادخال سعر الياردة  ',
            'rate_tax.required' => 'يرجى اخير نسبة الضريبة  ',
            'receivedamount.required' => 'يرجى ادخال  المبلغ المستلم',
            'supplier_id.required' => 'يرجى ادخال  اسم المورد',
            'color.required'=>'يرجى ادخال لون القماش'



        ];
    }
}
