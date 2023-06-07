<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeamoerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'shopname' => 'required|max:255',
            'facilitynumber'=>'required',
            'phone'=>'required|max:20',
            'email' => 'email:rfc,dns',
            'city'=>'required',
            'district'=>'required',
            'street'=>'required'

        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'يرجى ادخال اسم القصاص',
            'shopname.required'=>'يرجى ادخال اسم المحل',
            'facilitynumber.required'=>'يرجى ادخال رقم المنشاة',
            'recordnumber.required'=>'يرجى ادخال رقم السجل',
            'phone.required'=>'يرجى ادخال رقم الهاتف',
            'email.email'=>'يجب ان يكون الايميل صالحا',
            'phone.max'=>'يجب ان يكون رقم الهاتف 10 ارقام',
            'city.required'=>'يرجى ادخال  اسم المدينة',
            'street.required'=>'يرجى ادخال  اسم الشارع',
            'district'=>'يرجى ادخال  اسم الحي'

        ];
    }
}
