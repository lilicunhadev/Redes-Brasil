<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id_curso
 * @property string $ano
 * @property string $mes
 * @property string $dia
 * @property string $agenda_treinamento
 * @property string $nome_curso
 * @property string $qtde_dias
 * @property string $cidade
 * @property string $uf
 * @property string $local
 * @property string $instrutor
 * @property string $modulo
 * @property string $modalidade
 * @property string $max_alunos
 * @property string $inscritos
 * @property string $confirmados
 * @property string $pago
 * @property string $refaca
 * @property string $cortesia
 * @property string $finalizado
 * @property string $observacao
 * @property string $campanhas_ativas
 * @property string $inicio
 */
class Curso extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_curso';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ano', 'mes', 'dia', 'agenda_treinamento', 'nome_curso', 'qtde_dias', 'cidade', 'uf', 'local', 'instrutor', 'modulo', 'modalidade', 'max_alunos', 'inscritos', 'confirmados', 'pago', 'refaca', 'cortesia', 'finalizado', 'observacao', 'campanhas_ativas', 'inicio'];

}
