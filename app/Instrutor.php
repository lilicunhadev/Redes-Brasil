<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $nome
 * @property string $mikrotik
 * @property string $ubiquiti
 * @property string $juniper
 * @property string $vyos
 * @property string $cisco
 * @property string $linux
 * @property string $fibra_optica
 * @property string $ead
 * @property string $endereco
 * @property string $cpf
 * @property string $rg
 * @property string $passaporte
 * @property string $aeroporto_preferencia
 * @property string $observacao
 */
class Instrutor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'instrutores';

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
    protected $fillable = ['nome', 'mikrotik', 'ubiquiti', 'juniper', 'vyos', 'cisco', 'linux', 'fibra_optica', 'ead', 'endereco', 'cpf', 'rg', 'passaporte', 'aeroporto_preferencia', 'observacao'];

}
