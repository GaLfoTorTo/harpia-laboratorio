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
            $table->string('revisao_edicao_n', 14);
            $table->string('codigo', 15);
            $table->string('localizacao', 255);
            $table->string('data_da_atualizacao', 50);
            $table->string('analise_critica_verificacao', 10);
            $table->string('atualizacao_em', 255);
            $table->string('n_de_exemplares' , 10);
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
