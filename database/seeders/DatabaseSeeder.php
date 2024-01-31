<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aurelio Muzzi',
            'username' => 'aurelio',
            'perfil' => 1,
            'email' => 'aureliomuzzi@gmail.com',
            'password' => Hash::make('123'),
            'status' => 1
        ]);

        User::create([
            'name' => 'Evelen Helena',
            'username' => 'evelen',
            'perfil' => 1,
            'email' => 'evenlenhelena@gmail.com',
            'password' => Hash::make('123'),
            'status' => 1
        ]);

        User::create([
            'name' => 'Professor Gilbert',
            'username' => 'gilbert',
            'perfil' => 1,
            'email' => 'gilbert@ifam.edu.br',
            'password' => Hash::make('123'),
            'status' => 1
        ]);

        User::factory(20)->create();
    }
}
