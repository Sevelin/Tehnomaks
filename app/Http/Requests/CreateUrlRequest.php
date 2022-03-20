<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUrlRequest extends FormRequest
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
            'url'   =>  'required|url|max:250'
        ];
    }
    
    /**
    * Переводим сообщение на русский
    */
    public function messages()
    {
        return[
            'url.required'  =>  'Поле не должно быть пустым',
            'url.url'       =>  'Вы ввели некоректный url адрес',
            'url.max'       =>  'Максимальная длина :max символов'
        ];
    }
    
}
