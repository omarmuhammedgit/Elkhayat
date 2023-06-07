<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'no_employee' => 'required|unique:employes|max:20',
            'date_hiring' => 'required',
            'job_title' => 'required',
            'number_phone1' => 'required',
            'email' => 'required',
            'city' => 'required',
            'district' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'first_name.required' => 'يرجى ادخال اسم الموظف',
            'last_name.required' => 'يرجى ادخال اسم العائلة',
            'no_employee.unique' => 'رقم الموظف موجود مسبقأ',
            'date_hiring.required' => 'يرجى ادخال تاريخ التعين',
            'no_employee.required' => 'يرجى ادخال رقم الموظف',
            'number_phone1.required' => 'يرجى ادخال رقم الهاتف',
               'email.required'=>'يرجى ادخال البريد الالكتروني ',
            'number_phone1.max' => 'يجب ان يكون رقم الهاتف 10 ارقام',
            'job_title.required' => 'يرجى ادخال المسمى الوظيفي',
            'city.required' => 'يرجى ادخال  اسم المدينة',
            'street.required' => 'يرجى ادخال  اسم الشارع',
            'district.required' => 'يرجى ادخال  اسم الحي'



        ];
    }
}
