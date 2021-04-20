<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Faker\Provider\pt_BR\Person;

class ColaboradorSeeder extends Seeder
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
            DB::table('colaboradors')->insert([
                'nome' => $faker->name(),
                'email' => $faker->email(),
                'cpf' => $faker->numberBetween($min = 100, $max = 999).'.'.$faker->numberBetween($min = 100, $max = 999).'.'.$faker->numberBetween($min = 100, $max = 999).'-'.$faker->numberBetween($min = 10, $max = 99),
                'telefone' => '('.$faker->numberBetween($min = 10, $max = 99).') '.$faker->numberBetween($min = 10000, $max = 99999).'-'.$faker->numberBetween($min = 1000, $max = 9999),
                'cep' => $faker->numberBetween($min = 10000, $max = 99999).'-'.$faker->numberBetween($min = 100, $max = 999),
                'logradouro' => rand(1,0) == 0 ? 'rua '.$faker->name() : 'quadra '. $faker->numberBetween($min = 01, $max = 99),
                'bairro'=> $faker->name(),
                'numero'=> $faker->numberBetween($min = 01, $max = 99),
                'complemento'=> rand(1,0) == 0 ? '' : $faker->name(),
                'cidade'=> $faker->name(),
                'uf'=> 'DF',
                'formacao'=> rand(1,0) == 0 ? 'administrador' : '',
                'funcao'=> rand(1,0) == 0 ? 'supervisor' : 'tecnico',
                'setor'=> rand(1,0) == 0 ? 'Financeiro': 'Recursos Humanos',
                'foto'=> ''
            ]);
        }
    }
}
