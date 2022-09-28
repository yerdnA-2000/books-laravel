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
            'user_id' => 'required|integer', //для исключения из проверки текущей записи на уникальность 'email'
            'email' => 'required|email|max:255|unique:users,email,' . $this->user_id,
            'password' => 'required',
            'role' => 'nullable|integer',
        ];
    }
}
