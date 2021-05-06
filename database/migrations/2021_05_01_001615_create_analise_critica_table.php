<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaliseCriticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analise_critica', function (Blueprint $table) {
            $table->id();
            $table->enum('metodos_definidos', ['sim', 'nao'])->nullable();
            $table->enum('pessoal_qualificado', ['sim', 'nao'])->nullable();
            $table->enum('capacidade_recursos', ['sim', 'nao'])->nullable();
            $table->enum('metodo_ensaio', ['sim', 'nao'])->nullable();
            $table->enum('aprovado', ['sim', 'nao'])->nullable();
            $table->text('justificativa_reprovacao')->nullable();
            $table->bigInteger('colaborador_id')->nullable();
            $table->date('data')->nullable();
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
        Schema::dropIfExists('analise_critica');
    }
}
