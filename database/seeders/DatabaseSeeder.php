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
        $this->call(EquipamentosInsumosSeeder::class);
        $this->call(EquipamentosSeeder::class);
        $this->call(FornecedorSeeder::class);
<<<<<<< HEAD
        $this->call(Perguntas_lista_inspecaoSeeder::class);
=======
        $this->call(SetorsSeeder::class);
>>>>>>> de1c057e150672c92a17d187466abfaa0c203554
    }
}
