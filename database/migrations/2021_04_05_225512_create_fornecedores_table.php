<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['produto', 'servico']);
            $table->string('cnpj', 14);
            $table->string('razao_social', 100);
            $table->string('telefone', 100);
            $table->string('email', 100);
            $table->string('nome_fantasia', 100)->nullable();
            $table->string('nome_do_contato', 100)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('logradouro', 100)->nullable();
            $table->string('número', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
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
        Schema::dropIfExists('fornecedores');
        
    }
}
