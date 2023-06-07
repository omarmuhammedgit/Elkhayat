<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateRequest extends FormRequest
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
            'name'=>'required',
            'username'=>'required',
            'password' => 'confirmed',
            'active'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'الاسم مطلوب',
            'password.confirmed'=>'كلمة المرور غير متطابقة ',
            'username.required'=>'اسم المستخدم مطلوب',
            'active.required'=>'حالة التفعيل مطلوبة',
        ];
    }
}
