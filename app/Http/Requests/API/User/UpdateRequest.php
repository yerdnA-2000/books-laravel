<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'user_id' => 'required|integer', /*
                * для исключения из проверки текущей записи на уникальность 'email'
                * value from hidden input
                */
            'email' => 'required|email|max:255|unique:users,email,' . $this->user_id,
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
        ];
    }
}
