<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 120);
            $table->enum('tipo_material', ['MR', 'MRC'])->default('MR');
            $table->enum('tipo_servico', ['Manutenção corretiva', 'Manutenção preventiva', 'Calibração', 'Qualificação', 'Auditoria', 'Consultoria', 'Manutenção predial', 'Terceirização'])->nullable();
            $table->enum('servico_critico', ['Sim', 'Não'])->default('Não');
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
        Schema::dropIfExists('servicos');
    }
}
