<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_documento',['interno', 'externo'])->nullable();
            $table->string('titulo', 100)->nullable();
            $table->string('data_da_revisao_edicao_n')->nullable();
            $table->string('codigo', 15)->nullable();
            $table->string('localizacao', 255)->nullable();
            $table->date('data_da_ultima_analise_critica', 10)->nullable();
            $table->string('frequencia_da_analise_critica_verificacao', 255)->nullable();
            $table->date('atualizacao_em')->nullable();
            $table->integer('n_de_exemplares')->nullable();
            $table->string('documento', 255)->nullable();
            $table->enum('tipo', ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário'])->nullable();
            $table->string('revisao_edicao', 50)->nullable();
            $table->string('revisao_edicao_n', 50)->nullable();
            $table->date('data_aprovacao')->nullable();
            $table->date('proxima_analise_critica_em')->nullable();
            $table->integer('num_copias')->nullable();
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
        Schema::dropIfExists('documento');
    }
}
