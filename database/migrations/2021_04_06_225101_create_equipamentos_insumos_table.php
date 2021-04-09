<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentosInsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('equipamentos_insumos', function (Blueprint $table) {
                $table->id();
                $table->enum('materiais', ['Consumíveis', 'Reagente', 'Insumo', 'Materiais de Referência']);
                $table->string('nome', 100);
                $table->string('codigo', 50);
                $table->string('fabricante', 50);
                $table->string('fornecedor', 50);
                $table->enum('produto critico', ['Sim', 'Não']);
                $table->string('desc_produto', 90);
                $table->string('quantidade', 100);
                $table->enum('unidade', ['mg', 'g', 'kg', 'ml', 'l', 'unidade']);
                
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipamentos_insumos');
    }
}
