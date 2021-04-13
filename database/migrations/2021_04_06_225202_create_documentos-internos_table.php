<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosInternosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_internos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Manual','Procedimento','Anexo','Instrução de uso/trabalho','Formulário']);
            $table->string('codigo', 100)->nullable();
            $table->string('titulo', 50)->nullable();
            $table->string('revisao_edicao', 50)->nullable();
            $table->date('data_aprovacao')->nullable();
            $table->integer('num_copias')->nullable();
            $table->string('localizacao', 90)->nullable();
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
        Schema::dropIfExists('documentos_internos');
    }
}
