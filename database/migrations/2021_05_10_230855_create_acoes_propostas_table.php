<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcoesPropostasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acoes_propostas', function (Blueprint $table) {
            $table->id();
            $table->string('origem', 255);
            $table->string('acao', 255);
            $table->string('responsavel', 100)->nullable();
            $table->string('prazo', 100)->nullable();
            $table->date('prazo_final', 10)->nullable();
            $table->enum('necessaria_prorrogacao', ['Sim', 'Não'])->nullable();
            $table->text('justificativa')->nullable();
            $table->date('data_encerramento', 10)->nullable();
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
        Schema::dropIfExists('acoes_propostas');
    }
}
