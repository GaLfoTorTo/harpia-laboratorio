<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTemperaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_temperaturas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('equipamento_id')->nullable();
            $table->string('re_numero')->nullable();
            $table->string('mes_ano')->nullable();
            $table->string('dia')->nullable();
            $table->string('hora')->nullable();
            $table->bigInteger('colaborador_id')->nullable();
            $table->string('t_min')->nullable();
            $table->string('t_atual')->nullable();
            $table->string('t_max')->nullable();
            $table->text('observacoes');
            $table->string('decongela_dia')->nullable();
            $table->bigInteger('d_colaborador_id')->nullable();
            $table->string('limpeza_dia')->nullable();
            $table->bigInteger('l_colaborador_id')->nullable();
            $table->string('comprovacao_dia')->nullable();
            $table->bigInteger('c_colaborador_id')->nullable();
            $table->string('n_registro')->nullable();
            $table->text('analise_critica');
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
        Schema::dropIfExists('c_temperaturas');
    }
}
