<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Administrador']);
        $role1 = Role::create(['name' => 'Supervisor']);
        $role2 = Role::create(['name' => 'Operador']);

        Permission::create(['name' => 'home', 'grupo' => 'Dashboard', 'descripcion' => 'Pantalla inicial'])->assignRole([$role, $role1, $role2]);

        Permission::create(['name' => 'users.index', 'grupo' => 'USUARIOS', 'descripcion' => 'Ver Listado'])->assignRole([$role]);
        Permission::create(['name' => 'users.create', 'grupo' => 'USUARIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'users.edit', 'grupo' => 'USUARIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        // Permission::create(['name' => 'users.destroy', 'grupo' => 'USUARIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'admin.roles.index',  'grupo' => 'ROLES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.create',  'grupo' => 'ROLES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.edit',  'grupo' => 'ROLES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'admin.roles.destroy',  'grupo' => 'ROLES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'empresas.index',  'grupo' => 'EMPRESAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.create',  'grupo' => 'EMPRESAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.edit',  'grupo' => 'EMPRESAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.upddb',  'grupo' => 'EMPRESAS', 'descripcion' => 'Actualiza DB'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.destroy',  'grupo' => 'EMPRESAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);


        Permission::create(['name' => 'deudores.index',  'grupo' => 'DEUDORES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        // Permission::create(['name' => 'deudores.create',  'grupo' => 'DEUDORES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'deudores.edit',  'grupo' => 'DEUDORES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'deudores.destroy',  'grupo' => 'DEUDORES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'manejodeudas',  'grupo' => 'DEUDAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);

        // Permission::create(['name' => 'designaciones.index',  'grupo' => 'DESIGNACIONES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        // Permission::create(['name' => 'designaciones.create',  'grupo' => 'DESIGNACIONES', 'descripcion' => 'Crear'])->assignRole([$role]);
        // Permission::create(['name' => 'designaciones.edit',  'grupo' => 'DESIGNACIONES', 'descripcion' => 'Editar'])->assignRole([$role]);
        // Permission::create(['name' => 'designaciones.destroy',  'grupo' => 'DESIGNACIONES', 'descripcion' => 'Eliminar'])->assignRole([$role]);


    }
}
