<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Faker\Provider\pt_BR\Person;

class EquipamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $faker = Factory::create();
      
      for ($i=0; $i < 50; $i++) { 
         
       
        DB::table('equipamentos')->insert([
      [      
            'equipamento_proprio' =>  rand(1,0) == 0 ? 'Sim' : 'Não',
            'equipamento' => $faker->name(),
            'marca' => $faker->name(),
            'modelo' => $faker->bankAccounTNumber(),
            'tensao' => rand(1,0) == 0 ? '110' : '220',
            'manual' => rand(1,0) == 0 ? 'Sim' : 'Não',
            'num_serie' => $faker->bankAccounTNumber(),
            'localizacao_manual' => $faker->name(),
            'doc_instrucao' => $faker->name(),
            'codigo' => $faker->bankAccounTNumber(),
            'patrimonio' => $faker->name(),
            'fabricante' => $faker->name(),
            'fornecedor' => $faker->name(),
            'localizacao_equipamento' => $faker->name()
      ]

      ]);

      }

      

            
    }
}   