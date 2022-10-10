<?php

namespace App\Http\Requests\Book;

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
            'title' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'genres' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле не соответствует текстовому формату',
            'title.max' => 'Слишком много символов',
            'author_id.required' => 'Это поле необходимо для заполнения',
            'author_id.integer' => 'Почта не соответсвует числовому формату',
            'genres.required' => 'Это поле необходимо для заполнения',
            'genres.string' => 'Данные в поле не соответствуют формату',
        ];
    }
}
