<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->string('cargo');
            $table->enum('tipo_formacao', ['Ensino Fundamental', 'Ensino Médio', 'Graduação','Pós-Graduação']);
            $table->text('qualificacao');
            $table->text('xp_minima')->nullable();
            $table->text('treinamentos');       
            $table->text('habilidades')->nullable();
            $table->text('descricao')->nullable();
            $table->text('con_tecnico')->nullable();
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
        Schema::dropIfExists('cargos');
    }
}
