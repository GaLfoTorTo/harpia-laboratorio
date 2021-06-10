<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->enum('equipamento_proprio', ['Sim', 'Não']);
            $table->string('equipamento', 100);
            $table->string('marca', 50);
            $table->string('modelo', 50);
            $table->enum('tensao', ['110', '220','bivolt'])->nullable();
            $table->enum('manual', ['sim', 'não']);
            $table->string('num_serie', 90);
            $table->string('localizacao_manual')->nullable();
            $table->string('doc_instrucao')->nullable();
            $table->string('codigo', 100);
            $table->string('patrimonio', 100);
            $table->string('fabricante', 100);
            $table->string('fornecedor', 200)->nullable();
            $table->string('localizacao_equipamento')->nullable();
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
        Schema::dropIfExists('equipamentos');
    }
}