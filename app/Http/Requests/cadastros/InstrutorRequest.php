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
            'mikrotik' => 'max:5',
            'ubiquiti' => 'max:5',
            'juniper' => 'max:5',
            'vyos' => 'max:5',
            'cisco' => 'max:5',
            'linux' => 'max:5',
            'fibra_optica' => 'max:5',
            'ead' => 'max:5',
            'endereco' => 'max:200',
            'cpf' => 'max:20',
            'rg' => 'max:20',
            'passaporte' => 'max:20',
            'aeroporto_preferencia' => 'max:50',
            'observacao' => 'max:100',
            'assinatura' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
