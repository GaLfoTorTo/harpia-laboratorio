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
            $table->bigInteger('colaborador_id');
            $table->enum('manifestacao', ['Reclamação', 'Sugestão']);
            $table->string('data_abertura');
            $table->string('reclamante' , 100);
            $table->string('telefone', 15);
            $table->string('email', 70);
            $table->text('descricao');
            $table->enum('tipo_nc', ['Sim', 'Não']);
            $table->string('n_acao_corretiva')->nullable();
            $table->text('retorno')->nullable();
            $table->text('solucao')->nullable();
            $table->text('analise')->nullable();
            $table->text('feedback')->nullable();
            $table->bigInteger('rep_analise_id')->nullable();
            $table->string('data_encerramento')->nullable();
            $table->text('observacao')->nullable();
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
