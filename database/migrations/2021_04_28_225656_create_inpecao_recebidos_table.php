<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInpecaoRecebidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inpecao_recebidos', function (Blueprint $table) {
            $table->id();
            $table->string('produto', 70);
            $table->bigInteger('fornecedor_id');
            $table->string('fabricante', 70);
            $table->integer('nota_fiscal', 30);
            $table->string('lote', 30);
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
        Schema::dropIfExists('inpecao_recebidos');
    }
}
