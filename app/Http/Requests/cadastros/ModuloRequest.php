<?php

namespace App\Http\Requests\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class ModuloRequest extends FormRequest
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
            'modalidade' => 'required|string|max:20',
            'oficial' => 'required|string|max:10',
            'horas' => 'required|string|max:10',
            'prova_cert' => 'required|string|max:10',
            'valor_sugerido' => 'required|string|max:20',
            'max_alunos' => 'required|string|max:10',
            //'observacao' => 'string|max:200'
        ];
    }
}
