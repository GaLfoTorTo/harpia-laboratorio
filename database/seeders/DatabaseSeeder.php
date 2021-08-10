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
        $this->call(UserAdminSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(ColaboradorSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(Perguntas_lista_inspecaoSeeder::class);
        $this->call(SetorsSeeder::class);
        $this->call(AnalisecriticaSeeder::class);
    }
}
