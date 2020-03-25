<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstrutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrutores', function (Blueprint $table) {
            $table->bigIncrements('id_instrutor');
            $table->string('nome', 50);
            $table->string('mikrotik', 5)->nullable();
            $table->string('ubiquiti', 5)->nullable();
            $table->string('juniper', 5)->nullable();
            $table->string('vyos', 5)->nullable();
            $table->string('cisco', 5)->nullable();
            $table->string('linux', 5)->nullable();
            $table->string('fibra_optica', 5)->nullable();
            $table->string('ead', 5)->nullable();
            $table->string('endereco', 200)->nullable();
            $table->string('cpf', 20)->nullable();
            $table->string('rg', 20)->nullable();
            $table->string('passaporte', 20)->nullable();
            $table->string('aeroporto_preferencia', 50)->nullable();
            $table->string('observacao', 100)->nullable();
            //assinatura
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instrutores');
    }
}
