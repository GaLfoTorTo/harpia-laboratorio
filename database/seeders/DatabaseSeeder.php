<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientesSeeder::class);
        $this->call(ColaboradorSeeder::class);
        $this->call(DExternoSeeder::class);
        $this->call(DocumentosInternosSeeder::class);
        $this->call(EquipamentosInsumosSeeder::class);
        $this->call(EquipamentosSeeder::class);
    }
}
