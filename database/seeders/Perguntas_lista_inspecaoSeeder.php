<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Perguntas_lista_inspecaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('pergunta_lista_inspecaos')->get()->count() == 0){
    		DB::table('pergunta_lista_inspecaos')->insert([
                [
                    'pergunta' => 'Quantidade recebida confere com o pedido e coma nota fiscal?'
                ],
                [
                    'pergunta' => 'Fórmula molecular conferecom o pedido?'
                ],
                [
                    'pergunta' => 'FISPQ - Ficha de Informações de Segurança dos Produtos Químicos enviada?'
                ],
                [
                    'pergunta' => 'Lacre esta em condições adequada?'
                ],
                [
                    'pergunta' => 'Temperatura de transporte e recebimentos está em condições adequadas?'
                ],
                [
                    'pergunta' => 'Aspectos cor e odor estão adequados?'
                ],
                [
                    'pergunta' => 'Peso molecular confere com o pedido?'
                ],
                [
                    'pergunta' => 'Grau de pureza confere com o pedido?'
                ],
                [
                    'pergunta' => 'Apresenta as características especificas?'
                ],
                [
                    'pergunta' => 'Acompanhado de ficha técnica?'
                ],
                [
                    'pergunta' => 'Acompanhado de certificado do fabricante?'
                ],
                [
                    'pergunta' => 'Embalagens estão integras?'
                ],
                [
                    'pergunta' => 'Rótulos estão legiveis / intactos?'
                ],
                [
                    'pergunta' => 'Está acondicionado em recipiente adequado?'
                ],
                [
                    'pergunta' => 'Apresenta data de fabrição no rótulo?'
                ],
                [
                    'pergunta' => 'Apresenta data de validade no rótulo?'
                ],
                [
                    'pergunta' => 'Prazo de validade dentro do mínimo estipulado?'
                ],
                [
                    'pergunta' => 'Apresenta número de lote no rótulo?'
                ]
            ]);
        }
    }
}
