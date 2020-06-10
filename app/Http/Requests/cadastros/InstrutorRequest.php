<?php

namespace App\Http\Requests\cadastros;

use Illuminate\Foundation\Http\FormRequest;

class InstrutorRequest extends FormRequest
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
            'nome' => 'required|string|max:50',
            'mikrotik' => 'string|max:5',
            'ubiquiti' => 'string|max:5',
            'juniper' => 'string|max:5',
            'vyos' => 'string|max:5',
            'cisco' => 'string|max:5',
            'linux' => 'string|max:5',
            'fibra_optica' => 'string|max:5',
            'ead' => 'string|max:5',
            'endereco' => 'string|max:200',
            'cpf' => 'string|max:20',
            'rg' => 'string|max:20',
            'passaporte' => 'string|max:20',
            'aeroporto_preferencia' => 'string|max:50',
            'observacao' => 'string|max:100',
            'assinatura' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
