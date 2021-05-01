<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespostasListaInspecao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respostas_lista_inspecao', function (Blueprint $table) {
            $table->id();
            $table->enum('resposta',['sim','nao','na']);
            $table->bigInteger('produto_id');
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
        Schema::dropIfExists('respostas_lista_inspecao');
    }
}
