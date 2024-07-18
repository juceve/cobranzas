<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "name" => "Usuario Prueba",
            "email" => "prueba@admin",
            "cedula" => "prueba24",
            "password" => bcrypt('prueba24'),
        ])->assignRole('Administrador');
    }
}
