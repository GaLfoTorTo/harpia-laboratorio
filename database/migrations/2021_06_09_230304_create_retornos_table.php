<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetornosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retornos', function (Blueprint $table) {
            $table->id();
            $table->string('data_retorno');
            $table->text('descricao');
            $table->bigInteger('colaborador_id');
            $table->bigInteger('reclamacao_id');
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
        Schema::dropIfExists('retornos');
    }
}
