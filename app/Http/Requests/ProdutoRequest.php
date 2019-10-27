<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'marca_id' => 'required|numeric',
            'valor' => 'required|numeric',
            'cor' => 'required|max:128',
            'cor_html' => 'required|max:128',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'É necessário inserir o :attribute',
            'nome.max' => 'O :attribute ultrapassou o máximo de caracteres permitidos: :max',
            'valor.required' => 'É necessário inserir o :attribute',
            'valor.numeric' => 'Valor invalido',
            'marca_id.required' => 'É necessário inserir a marca',
            'cor.required' => 'É necessário inserir a cor',
            'cor_html.required' => 'É necessário inserir a cor em html',

        ];
    }
}
