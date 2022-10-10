<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Почта не соответсвует формату user@some.domain',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные в поле не соответствуют текстовому формату',
        ];
    }
}
