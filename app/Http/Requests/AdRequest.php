<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:200',
            'description' => "required|string|max:1000",
            'price' => 'sometimes|string',
            'photos' => 'sometimes|array|max:3|distinct',
        ];
    }

    public function messages()
    {
        return [
          'title.required' => 'Заголовок обязателен для заполнения',
          'title.max' => 'Длина заголовка не более 200 символов',
          'description.required' => 'Описание обязателено для заполнения',
          'description.max' => 'Длина описания не более 1000 символов',
          'photos.max' => 'Не более 3 фото',
          'photos.distinct' => 'Нельзя загружать одинаковые фото'
        ];
    }
}
