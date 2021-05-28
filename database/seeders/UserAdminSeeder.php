<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@harpia.com',
            'password' => bcrypt('harpia@321'),
            'foto' => '/uploads/user/20210527140559.png'
        ]);
    }
}
