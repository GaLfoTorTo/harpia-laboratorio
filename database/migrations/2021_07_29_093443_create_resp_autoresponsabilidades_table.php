<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespAutoresponsabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_autoresponsabilidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsabilidades_id');
            $table->foreign('responsabilidades_id')->references('id')->on('responsa_autos');
            $table->unsignedBigInteger('resp_auto_id');
            $table->foreign('resp_auto_id')->references('id')->on('responsa_autos');
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
        Schema::dropIfExists('resp_autoresponsabilidades');
    }
}
