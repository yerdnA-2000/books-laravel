<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string',
            'roles' => 'required|array',
            'permissions' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Почта не соответсвует формату user@some.domain',
            'email.unique:users,email' => 'Пользователь с таким email уже существует',
            'email.max:255' => 'Слишком много символов',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные в поле не соответствуют текстовому формату',
            'roles.required' => 'Это поле необходимо для заполнения',
            'roles.array' => 'Данные в поле не соответствуют формату',

        ];
    }
}
