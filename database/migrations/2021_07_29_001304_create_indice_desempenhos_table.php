<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndiceDesempenhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indice_desempenhos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fornecedor_id');
            $table->string('cnpj', 18);
            $table->string('ano_referencia', 4);
            $table->date('data_entrega', 10);
            $table->string('pedido_compra', 30);
            $table->integer('pedidos_entregues');
            $table->integer('pedidos_entregues_atraso');
            $table->integer('pedidos_devolvidos');
            $table->integer('pedidos_nao_conforme');
            $table->string('pontualidade', 6);
            $table->string('conformidade', 6);
            $table->string('calculo_idf', 6);
            $table->string('desempenho_fornecedor', 1);
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
        Schema::dropIfExists('indice_desempenhos');
    }
}
