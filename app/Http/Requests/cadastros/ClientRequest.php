<?php

namespace App\Http\Requests\cadastros;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'nome' => 'required|string|max:100',
            'tipo_pessoa' => 'required|string|max:100',
            'pais' => 'required|string|max:50',
            'cep' => 'required|string|max:20',
            'endereco' => 'required|string|max:200',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'uf' => 'required|string|max:5',
            'telefone' => 'required|string|max:20',
            'celular' => 'required|string|max:20',
            'email' => 'required|string|email|max:100',
            'empresa' => 'required|string|max:100',
            'cpf_cnpj' => 'required|string|max:100',
            'tipo_cliente' => 'required|string|max:100',
            'onde_nos_encontrou' => 'required|string|max:100'
        ];
    }
}
