<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'cep' =>'required',
            'numero' =>'required',
            'logradouro' =>'required',
            'bairro' =>'required',
            'cidade' =>'required',
            'estado_id' =>'required',
            'user_id' =>'required',
            'entrega24hrs' => 'required'
        ];
    }
}
