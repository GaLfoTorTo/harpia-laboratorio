<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanoManutencaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_manutencaos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('equipamento_id');
            $table->string('marca', 90);
            $table->string('modelo', 90);
            $table->string('num_serie', 90);
            $table->string('area_trabalho', 90);
            $table->string('faixa_medicao', 90);
            $table->string('pontos_calibracao', 90);
            $table->date('ultima_calibracao', 90);
            $table->date('proxima_calibracao', 90);
            $table->date('ultima_manutencao', 90);
            $table->date('proxima_manutencao', 90);
            $table->text('documento', 90);
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
        Schema::dropIfExists('plano_manutencaos');
    }
}
