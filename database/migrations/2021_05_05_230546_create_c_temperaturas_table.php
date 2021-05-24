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
            $table->bigInteger('equipamento_id');
            $table->string('re_numero');
            $table->string('mes_ano');
            $table->string('dia');
            $table->string('hora');
            $table->bigInteger('colaborador_id');
            $table->string('t_min');
            $table->string('t_atual');
            $table->string('t_max');
            $table->text('observacoes')->nullable();
            $table->string('decongela_dia')->nullable();
            $table->bigInteger('d_colaborador_id')->nullable();
            $table->string('limpeza_dia')->nullable();
            $table->bigInteger('l_colaborador_id')->nullable();
            $table->string('comprovacao_dia')->nullable();
            $table->bigInteger('c_colaborador_id')->nullable();
            $table->string('n_registro')->nullable();
            $table->text('analise_critica')->nullable();
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
        Schema::dropIfExists('c_temperaturas');
    }
}
