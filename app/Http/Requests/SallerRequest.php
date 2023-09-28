<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SallerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'surname'=>'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'phone'=>'required|unique:sallers,phone|numeric|digits:12',
            'email'=>'unique:sallers,email'
        ];
    }

    public function messages(){
        return[
            'confirm_password.same'=>"Qayta terilgan paro'l noto'g'ri kiritilgan",
            'phone.unique'=>"Bu raqam  allaqachon ro'yxatdan o'tgan",
            'email.unique'=>"Bu email  allaqachon ro'yxatdan o'tgan",
        ];
    }
}
