<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcaRequest extends FormRequest
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
            'nome' => 'required|max:128',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'É necessário inserir o :attribute',
            'nome.max' => 'O :attribute ultrapassou o máximo de caracteres permitidos: :max',
        ];
    }
}
