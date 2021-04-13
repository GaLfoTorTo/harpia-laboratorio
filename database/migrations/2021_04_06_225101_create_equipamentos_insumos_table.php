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

                $table->enum('materiais', ['Consumíveis', 'Reagente', 'Insumo', 'Materiais de Referência'])->nullable();
                $table->string('nome', 100)->nullable();
                $table->string('codigo', 50)->nullable();
                $table->string('fabricante', 50)->nullable();
                $table->string('fornecedor', 50)->nullable();
                $table->enum('produto_critico', ['Sim', 'Não'])->nullable();
                $table->enum('materiais_referencia', ['MR', 'MRC'])->nullable();
                $table->string('desc_produto', 90)->nullable();
                $table->string('quantidade', 100)->nullable();
                $table->enum('unidade', ['mg', 'g', 'kg', 'ml', 'l', 'unidade'])->nullable();
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
        Schema::dropIfExists('equipamentos_insumos');
    }
}
