<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDExternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_externos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->integer('revisao_edicao_n')->nullable();
            $table->string('codigo', 15);
            $table->string('localizacao', 255)->nullable();
            $table->date('data_da_atualizacao', 10)->nullable();
            $table->string('analise_critica_verificacao', 255);
            $table->date('atualizacao_em')->nullable();
            $table->integer('n_de_exemplares')->nullable();
            $table->string('documento', 255)->nullable();
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
        Schema::dropIfExists('d_externos');
    }
}
