<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        return 
        [

            'password' => 'required',
            'current_password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(){
        return[
            'password_confirmation'=>"Qayta terilgan paro'l noto'g'ri kiritilgan",
            'password' => "Yangi parol maydonini to'ldirish talab qilinadi.",
            'current_password' => "Joriy parol maydonini to'ldirish talab qilinadi.",
            

        ];
    }
}
