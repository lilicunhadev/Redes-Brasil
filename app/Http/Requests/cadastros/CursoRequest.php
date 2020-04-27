<?php

namespace App\Http\Requests\Cadastros;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'ano' => 'required|string|max:6',
            'mes' => 'required|string|max:4',
            'dia' => 'required|string|max:4',
            'agenda_treinamento' => 'required|string|max:50',
            'nome' => 'required|string|max:50',
            'qtde_dias' => 'required|string|max:5',
            'cidade' => 'required|string|max:50',
            'uf' => 'required|string|max:5',
            'local' => 'required|string|max:50',
            'instrutor' => 'required|string|max:50',
            'modulo' => 'required|string|max:50',
            'modalidade' => 'required|string|max:20',
            'max_alunos' => 'required|string|max:5',
            'inscritos' => 'required|string|max:5',
            'confirmados' => 'required|string|max:5',
            'pago' => 'required|string|max:5',
            'refaca' => 'required|string|max:5',
            'cortesia' => 'required|string|max:5',
            'finalizado' => 'required|string|max:10',
            //'observacao' => 'required|string|max:50',
            'campanhas_ativas' => 'required|string|max:50',
            'inicio' => 'required|string|max:20'

        ];
    }
}
