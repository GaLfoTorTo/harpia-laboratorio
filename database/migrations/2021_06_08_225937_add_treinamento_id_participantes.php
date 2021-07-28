<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTreinamentoIdParticipantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participantes_treinamento', function (Blueprint $table) {
            $table->bigInteger('registro_treinamento_id')->unsigned();
            $table->foreign('registro_treinamento_id')->references('id')->on('registro_treinamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participantes_treinamento', function (Blueprint $table) {
            $table->dropColumn('registro_treinamento_id');
        });
    }
}
