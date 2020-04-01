<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nome
 * @property string $modalidade
 * @property string $oficial
 * @property string $horas
 * @property string $prova_cert
 * @property string $valor_sugerido
 * @property string $max_alunos
 * @property string $observacao
 */
class Modulo extends Model
{
    public $timestamps = false;
    
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'modalidade', 'oficial', 'horas', 'prova_cert', 'valor_sugerido', 'max_alunos', 'observacao'];

}
