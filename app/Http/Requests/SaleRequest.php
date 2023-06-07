<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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

            'customer' => 'required|max:255',
            'invoice_number'=>'required|max:20',
            'number_dresses'=>'required',
            'detail_duration'=>'required',
            'code'=>'required',
            'price_include_tax'=>'required',
            'receivedamount'=>'required',
        ];
    }

    public function messages()
    {
        return[
            'customer.required'=>'يرجى ادخال اسم العميل',
            'invoice_number.required'=>'يرجى ادخال رقم الفاتورة',
            'phone.required'=>'يرجى ادخال رقم الهاتف',
            'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
            'number_dresses.required'=>'يرجى ادخال  عدد  الثياب',
            'detail_duration.required'=>'يرجى ادخال  مدة التفصيل',
            'code.required'=>'يرجى ادخال  كود العميل',
            'price_include_tax.required'=>'يرجى ادخال  المبيلغ شامل الضريبة',
            'discount.required'=>'يرجى ادخال  قمية الخصم',
            'receivedamount.required'=>'يرجى ادخال  المبلغ المستلم',
            'name_design.required'=>'يرجى ادخال اسم التصميم',
            'name_section.required'=>'يرجى ادخال اسم القسم',
            'type_fabrice.required'=>'يرجى ادخال نوع القماش',
            'name_trade_mark.required'=>'يرجى ادخال اسم العلامة التجارية',
            'retribution.required'=>'يرجى ادخال اسم القصاص',
            'seamoer.required'=>'يرجى ادخال اسم الخياط',
            'seamtress.required'=>'يرجى اختيار نوع الخياطة',
            'discount.required'=>'يرجى ادخال قيمة الخصم حتى و لو  صفر'

        ];
    }
}
