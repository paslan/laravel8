<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
             'name' => 'required|min:5|max:30',
             'description' => 'nullable|min:5|max:150',
             'photo' => 'required|image',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Campo nome deverá conter no mínimo 5 caracteres'
        ];
    }
}
