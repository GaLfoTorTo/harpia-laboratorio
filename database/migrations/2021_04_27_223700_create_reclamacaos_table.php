<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamacaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('colaborador_id')->nullable();
            $table->string('n_registro')->nullable();
            $table->enum('manifestacao', ['Reclamação', 'Sugestão'])->nullable();
            $table->string('data_abertura')->nullable();
            $table->string('reclamante' , 100);
            $table->string('telefone', 15);
            $table->string('email', 70);
            $table->text('descricao');
            $table->enum('tipo_nc', ['Sim', 'Não']);
            $table->string('n_acao_corretiva');
            $table->text('retorno');
            $table->text('solucao');
            $table->text('analise');
            $table->text('feedback');
            $table->bigInteger('rep_analise_id')->nullable();
            $table->string('data_encerramento') ->nullable();
            $table->text('observacao');
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
        Schema::dropIfExists('reclamacaos');
    }
}
