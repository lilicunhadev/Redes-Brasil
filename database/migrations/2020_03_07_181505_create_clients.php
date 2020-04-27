<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome', 100);
            $table->string('tipo_pessoa', 100);
            $table->string('pais', 50);
            $table->string('cep', 20);
            $table->string('endereco', 200);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('uf', 5);
            $table->string('telefone', 20)->nullable();
            $table->string('celular', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('empresa', 100);
            $table->string('cpf_cnpj', 100)->nullable();
            $table->string('tipo_cliente', 100);
            $table->string('onde_nos_encontrou', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
