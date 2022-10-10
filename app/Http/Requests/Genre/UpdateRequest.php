<?php

namespace App\Http\Requests\Genre;

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
            'id' => 'required|integer',   //для исключения из проверки текущей записи на уникальность 'title'
            'title' => 'required|string|max:55|unique:genres,title,' . $this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Это поле не соответствует текстовому формату',
            'title.max' => 'Слишком много символов',
            'title.unique:genres,title' => 'Жанр с таким наименованием уже существует',
        ];
    }
}
