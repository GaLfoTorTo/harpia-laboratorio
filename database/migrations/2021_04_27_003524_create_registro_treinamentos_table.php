<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTreinamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_treinamento', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100)->nullable();
            $table->string('carga_horaria', 10)->nullable();
            $table->date('data_inicial', 10)->nullable();
            $table->date('data_final', 10)->nullable();
            $table->string('conteudo', 255);
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
        Schema::dropIfExists('registro_treinamento');
    }
}
