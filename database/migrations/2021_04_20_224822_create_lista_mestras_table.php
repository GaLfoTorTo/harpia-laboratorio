<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaMestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_mestras', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'])->nullable();
            $table->bigInteger('documento_id');
            $table->string('codigo', 15)->nullable();
            $table->string('titulo', 100)->nullable();
            $table->string('revisao_n', 100)->nullable();
            $table->date('data_aprovacao')->nullable();
            $table->integer('n_copias')->nullable();
            $table->string('localizacao', 90)->nullable();
            $table->date('data_analise')->nullable();
            $table->string('atualizacao_em', 100)->nullable();
            $table->string('documento', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_mestras');
    }
}
