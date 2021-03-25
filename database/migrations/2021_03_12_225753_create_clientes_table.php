<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('cpf_cnpj', 14);
            $table->string('email')->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('logradouro', 150)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->enum('tipo_unidade', ['matriz', 'filial']);
            $table->string('codigo_cliente', 70);
            $table->enum('responsavel_tecnico', ['fransisco', 'juraildo'] );
            $table->enum('responsavel_financeiro', ['marconi', 'persival'] );
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
        Schema::dropIfExists('clientes');
    }
}
