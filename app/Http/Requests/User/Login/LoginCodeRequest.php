<?php

namespace App\Http\Requests\User\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginCodeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|max:255',
            'code' => 'required|string|size:5',
        ];
    }

    
    public function messages(): array
    {
        return [
            'email.email' => 'Нужен валидный адрес электронной почты',
            'code.size' => 'Размер кода должен быть 5 символов',
        ];
    }
}
