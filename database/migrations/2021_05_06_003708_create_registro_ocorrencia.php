<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroOcorrencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_ocorrencia', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 100)->nullable();
            $table->string('responsavel')->nullable();
            $table->string('origem')->nullable();
            $table->date('data_de_abertura')->nullable();
            $table->string('identificacao_do_equipamento')->nullable();
            $table->string('cod_equipamento')->nullable();
            $table->text('descricao_da_ocorrencia')->nullable();
            $table->enum('necessario_correcao_imediata', ['Sim', 'Não'])->nullable();
            $table->text('descrever_correcao')->nullable();
            $table->string('ocorrencia_e_um_trabalho_NC')->nullable();
            $table->string('registro_de_AC_n')->nullable();
            $table->text('parecer_tecnico')->nullable();
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('registro_ocorrencia');
    }
}
