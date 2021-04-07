<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Faker\Provider\pt_BR\Person;
use Faker\Provider\pt_SA\Payment;

class DExternoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 100; $i++) { 
            DB::table('d_externos')->insert([
                'titulo' => $faker->name(),
                'revisao_edicao_n' => $faker->numberBetween($min = 100000000, $max= 999999999),
                'codigo' => $faker->numberBetween($min = 1000, $max = 9999),
                'n_de_exemplares' => $faker->numberBetween($min=100, $max = 999),
                'localizacao' => $faker->name(),
                'data_da_atualizacao' => $faker->numberBetween($min = 01, $max = 31).'/'.$faker->numberBetween($min = 01, $max = 12).'/'.$faker->numberBetween($min = 2000, $max = 2021),
                'analise_critica_verificacao' => $faker->name().' '.$faker->name(),
                'atualizacao_em' => $faker->numberBetween($min = 01, $max = 31).'/'.$faker->numberBetween($min = 01, $max = 12).'/'.$faker->numberBetween($min = 2000, $max = 2021)
            ]);
        }
    }
}
