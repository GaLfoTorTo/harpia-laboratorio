<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspecaoRecebidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecao_recebidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')
                    ->references('id')
                    ->on('equipamentos_insumos')
                    ->unsigned();
            $table->string('fornecedor', 100)->nullable();
            $table->string('fabricante', 70)->nullable();
            $table->string('nota_fiscal', 30);
            $table->string('lote', 30)->nullable();
            $table->text('descricao_teste')->nullable();
            $table->enum('insumo_liberado',['sim','nao'])->nullable();
            $table->text('justificativa')->nullable();
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
        Schema::dropIfExists('inspecao_recebidos');
    }
}
