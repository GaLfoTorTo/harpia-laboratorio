<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovosRncsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novos_rncs', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->nullable();
            $table->string('revisao', 10)->nullable();
            $table->string('numero', 10);
            $table->date('data_abertura', 10);
            $table->string('responsavel', 100);
            $table->enum('classificacao_acao', ['Correção', 'Ação Preventiva', 'Melhoria', 'Ação Corretiva']);
            $table->enum('origem', ['Registro de Ocorrência', 'Auditoria Interna', 'Análise Crítica pela Gerência', 'Rotina', 'Gestão de Riscos', 'Auditória Externa', 'Outros', 'Reclamação', 'Proficiência', 'Interlaboratorial']);
            $table->string('identificacao', 100)->nullable();
            $table->enum('doc_referencia', ['Internos', 'CGCRE', 'Acordo Cliente'])->nullable();
            $table->string('requisito', 255)->nullable();
            $table->text('descricao');
            $table->enum('necessario_analise', ['Sim', 'Não']);
            $table->text('analise_causa')->nullable();
            $table->text('causa_raiz')->nullable();
            $table->enum('nc_consequencia', ['Sim', 'Não']);
            $table->text('relato_nc')->nullable();
            $table->enum('tratativa_eficaz', ['Sim', 'Não']);
            $table->text('relato_tratativa')->nullable();
            $table->date('data_avaliacao', 10)->nullable();
            $table->enum('risco_avaliado', ['Sim, não compromete os resultados', 'Sim, evidenciado na planilha de gestão de risco']);
            $table->string('n_risco', 100)->nullable();
            $table->string('responsavel_encerramento', 100);
            $table->date('data_responsavel', 10)->nullable();
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('novos_rncs');
    }
}
