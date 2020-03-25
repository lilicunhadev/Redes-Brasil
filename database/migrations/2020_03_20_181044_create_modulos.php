<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulos', function (Blueprint $table) {
            $table->bigIncrements('id_modulo');
            $table->string('nome', 50);
            $table->string('modalidade', 20);
            $table->string('oficial', 10);
            $table->string('horas', 10);
            $table->string('prova_cert', 10);
            $table->string('valor_sugerido', 20);
            $table->string('max_alunos', 10);
            $table->string('observacao', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulos');
    }
}
