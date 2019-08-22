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
            'quantidade' => 'required|numeric',
            'marca_id' => 'required|numeric',
            'valor' => 'required|numeric',
            'tamanho' => 'required|max:128',
            //'imagem' => 'required|max:264|image'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'É necessário inserir o :attribute',
            'nome.max' => 'O :attribute ultrapassou o máximo de caracteres permitidos: :max',
            'quantidade.required' => 'É necessário inserir a :attribute',
            'quantidade.numeric' => ':attribute invalida',
            'marca_id.required' => 'É necessário inserir a marca',
            'valor.required' => 'É necessário inserir o :attribute',
            'valor.numeric' => 'Valor invalido',
            'tamanho.required' => 'É necessário inserir o :attribute',
            'tamanho.max' => 'O :attribute ultrapassou o máximo de caracteres permitidos: :max',
            //'imagem.required' => 'É necessário inserir a :attribute',
            'imagem.image' => 'Arquivo invalido',
            'imagem.max' => 'A :attribute ultrapassou o máximo de caracteres permitidos: :max',

        ];
    }
}
