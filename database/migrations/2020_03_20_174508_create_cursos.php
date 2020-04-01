<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ano', 6);
            $table->string('mes', 4);
            $table->string('dia', 4);
            $table->string('agenda_treinamento', 50);
            $table->string('nome_curso', 50);
            $table->string('qtde_dias', 5);
            $table->string('cidade', 50);
            $table->string('uf', 5);
            $table->string('local', 50);
            $table->string('instrutor', 50);
            $table->string('modulo', 50);
            $table->string('modalidade', 20);
            $table->string('max_alunos', 5);
            $table->string('inscritos', 5)->nullable();
            $table->string('confirmados', 5)->nullable();
            $table->string('pago', 5)->nullable();
            $table->string('refaca', 5)->nullable();
            $table->string('cortesia', 5)->nullable();
            $table->string('finalizado', 10)->nullable();
            $table->string('observacao', 200)->nullable();
            $table->string('campanhas_ativas', 50)->nullable();
            $table->string('inicio', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
