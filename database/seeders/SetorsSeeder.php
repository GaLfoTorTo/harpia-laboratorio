<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('setors')->get()->count() == 0){
            DB::table('setors')->insert([
                [
                    'setor' => 'Financeiro',
                    'setors_id' => null
                ],
                [
                    'setor' => 'Recursos Humanos',
                    'setors_id' => null
                ],
                [
                    'setor' => 'Contabilidade',
                    'setors_id' => 1
                ],
                [
                    'setor' => 'Treinamento',
                    'setors_id' => 2
                ]
            ]);
        }
    }
}
