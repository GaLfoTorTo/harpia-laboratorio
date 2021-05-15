<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostaListaInspecaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resposta_lista_inspecaos', function (Blueprint $table) {
            $table->id();
            $table->enum('resposta',['sim','nao','na']);
            $table->unsignedBigInteger('inspecao_id');
            $table->foreign('inspecao_id')
                    ->references('id')
                    ->on('inspecao_recebidos')
                    ->unsigned();
            $table->bigInteger('pergunta_id');
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
        Schema::dropIfExists('resposta_lista_inspecaos');
    }
}
