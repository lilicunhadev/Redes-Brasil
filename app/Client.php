<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;

/**
 * @property integer $id
 * @property string $nome
 * @property string $tipo_pessoa
 * @property string $pais
 * @property string $cep
 * @property string $endereco
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $telefone
 * @property string $celular
 * @property string $email
 * @property string $empresa
 * @property string $cpf_cnpj
 * @property string $tipo_cliente
 * @property string $onde_nos_encontrou
 */
class Client extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'tipo_pessoa', 'pais', 'cep', 'endereco', 'bairro', 'cidade', 'uf', 'telefone', 'celular', 'email', 'empresa', 'cpf_cnpj', 'tipo_cliente', 'onde_nos_encontrou'];

    public function state()
    {
        return $this->hasOne(State::class,'id','uf');
    }

}
