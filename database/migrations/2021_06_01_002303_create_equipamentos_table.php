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
            $table->enum('tipo_equipamento', ['Insumo', 'Medicao'])->nullable();
            $table->enum('equipamento_proprio', ['Sim', 'Não'])->nullable();
            $table->string('equipamento', 100)->nullable();
            $table->string('marca', 50)->nullable();
            $table->string('modelo', 50)->nullable();
            $table->enum('tensao', ['110', '220','bivolt'])->nullable();
            $table->enum('manual', ['sim', 'não'])->nullable();
            $table->string('num_serie', 90)->nullable();
            $table->string('localizacao_manual')->nullable();
            $table->string('doc_instrucao')->nullable();
            $table->string('patrimonio', 100)->nullable();
            $table->string('localizacao_equipamento')->nullable();
            $table->enum('materiais', ['Consumíveis', 'Reagente', 'Insumo', 'Materiais de Referência'])->nullable();
            $table->string('nome', 100)->nullable();
            $table->string('codigo', 50)->nullable();
            $table->string('fabricante', 50)->nullable();
            $table->string('fornecedor', 100)->nullable();
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
        Schema::dropIfExists('equipamentos');
    }
}
