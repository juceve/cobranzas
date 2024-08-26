<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(userSeeder::class);
        // \App\Models\User::factory(10)->create();

        \App\Models\Tipodoc::create([
            'nombre' => 'CEDULA IDENTIDAD',
            'nombrecorto' => 'CI',
        ]);
        \App\Models\Tipodoc::create([
            'nombre' => 'NUM. IDENT. TRIBUTARIA',
            'nombrecorto' => 'NIT',
        ]);
        \App\Models\Tipodoc::create([
            'nombre' => 'CEDULA EXTRANJERO',
            'nombrecorto' => 'CE',
        ]);
        \App\Models\Tipodoc::create([
            'nombre' => 'PASAPORTE',
            'nombrecorto' => 'PS',
        ]);
    }
}
