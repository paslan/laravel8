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
        $id = $this->segment(2);

        return [
             'name' => "required|min:5|max:30|unique:products,name,{$id},id",
             'description' => 'required|min:5|max:150',
             'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
             'photo' => 'image',
        ];
    }


    //Personalizando mensagens de erro
    // public function messages()
    // {
    //     return[
    //         'name.required' => 'Nome é obrigatório',
    //         'name.min' => 'Campo nome deverá conter no mínimo 5 caracteres'
    //     ];
    // }
}
