<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Faker\Provider\pt_BR\Person;
use Faker\Provider\ar_SA\Payment;

class FornecedorSeeder extends Seeder
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
         
       
        DB::table('fornecedores')->insert([
      [      
        'tipo' => rand(1,0) == 0 ? 'produto' : 'servico',
        'cnpj' => $faker->numberBetween($min = 10, $max = 99).'.'.$faker->numberBetween($min = 100, $max = 999).'.'.$faker->numberBetween($min = 100, $max = 999).'/'.$faker->numberBetween($min = 1000, $max = 9999).'-'.$faker->numberBetween($min = 10, $max = 99),
        'razao_social' => $faker->name(),
        'email' => $faker->email(),
        'nome_fantasia' => $faker->name(),
        'nome_do_contato' => $faker->name(),
        'telefone' => '('.$faker->numberBetween($min = 10, $max = 99).') '.$faker->numberBetween($min = 10000, $max = 99999).'-'.$faker->numberBetween($min = 1000, $max = 9999),
        'cep' => $faker->numberBetween($min = 10000, $max = 99999).'-'.$faker->numberBetween($min = 100, $max = 999),
        'logradouro' => rand(1,0) == 0 ? 'rua '.$faker->name() : 'quadra '. $faker->numberBetween($min = 01, $max = 99),
        'numero'=> $faker->numberBetween($min = 01, $max = 99),
        'complemento'=> rand(1,0) == 0 ? '' : $faker->name(),
        'bairro'=> $faker->name(),
        'cidade'=> $faker->name(),
        'uf'=> rand(1,0) == 0 ? 'DF' : 'SP'
        ]

        ]);
  
        }
  
        
  
              
      }
  }   