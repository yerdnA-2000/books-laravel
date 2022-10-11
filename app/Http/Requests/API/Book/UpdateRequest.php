<?php

namespace App\Http\Requests\API\Book;

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
            'title' => 'nullable|string|max:255',
            'genres' => 'nullable|array'
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Это поле не соответствует текстовому формату',
            'title.max' => 'Слишком много символов',
            'genres.string' => 'Данные в поле не соответствуют формату',
        ];
    }
}
