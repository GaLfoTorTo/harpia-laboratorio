<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 70);
            $table->string('cpf', 14);
            $table->string('telefone', 15);
            $table->string('cep', 9)->nullable();
            $table->string('logradouro', 70)->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro', 30)->nullable();
            $table->string('complemento', 70)->nullable();
            $table->string('cidade', 30)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('formacao', 30)->nullable();
            $table->string('funcao', 30)->nullable();
            $table->text('foto', 255)->nullable();
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
        Schema::dropIfExists('colaboradors');
    }
}
