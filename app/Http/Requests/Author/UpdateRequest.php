<?php

namespace App\Http\Requests\Author;

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
            'full_name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Это поле необходимо для заполнения',
            'full_name.string' => 'Это поле не соответствует текстовому формату',
            'full_name.max' => 'Слишком много символов',
        ];
    }
}
