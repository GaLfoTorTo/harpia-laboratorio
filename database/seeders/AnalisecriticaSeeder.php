<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Faker\Provider\pt_BR\Person;
use Faker\Provider\ar_SA\Payment;

class AnalisecriticaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 75; $i++) { 
            DB::table('analise_critica')->insert([
           
            'metodos_definidos' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'pessoal_qualificado' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'capacidade_recursos' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'metodo_ensaio' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'aprovado' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'justificativa_reprovacao' => $faker->name(),
            'colaborador_id' => rand(1,0) == 0 ? 1 : 5,
            'data' => $faker->dateTimeThisYear()
            
            ]);
        }
    }
}


   