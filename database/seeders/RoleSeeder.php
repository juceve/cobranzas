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

        Permission::create(['name' => 'zonas.index',  'grupo' => 'ZONAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.create',  'grupo' => 'ZONAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.edit',  'grupo' => 'ZONAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'zonas.destroy',  'grupo' => 'ZONAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'gestiontipos.index',  'grupo' => 'TIPOS DE GESTION', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'gestiontipos.create',  'grupo' => 'TIPOS DE GESTION', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'gestiontipos.edit',  'grupo' => 'TIPOS DE GESTION', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'gestiontipos.destroy',  'grupo' => 'TIPOS DE GESTION', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'empresas.index',  'grupo' => 'EMPRESAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.create',  'grupo' => 'EMPRESAS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.edit',  'grupo' => 'EMPRESAS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.upddb',  'grupo' => 'EMPRESAS', 'descripcion' => 'Actualiza DB'])->assignRole([$role]);
        Permission::create(['name' => 'empresas.destroy',  'grupo' => 'EMPRESAS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'estadocontactos.index',  'grupo' => 'ESTADO CONTACTOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'estadocontactos.create',  'grupo' => 'ESTADO CONTACTOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'estadocontactos.edit',  'grupo' => 'ESTADO CONTACTOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'estadocontactos.destroy',  'grupo' => 'ESTADO CONTACTOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'recordatorios.index',  'grupo' => 'RECORDATORIOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'recordatorios.create',  'grupo' => 'RECORDATORIOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'recordatorios.edit',  'grupo' => 'RECORDATORIOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'recordatorios.destroy',  'grupo' => 'RECORDATORIOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'compromisopagos.index',  'grupo' => 'COMPROMISOS DE PAGO', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'compromisopagos.create',  'grupo' => 'COMPROMISOS DE PAGO', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'compromisopagos.edit',  'grupo' => 'COMPROMISOS DE PAGO', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'compromisopagos.destroy',  'grupo' => 'COMPROMISOS DE PAGO', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'metodopagos.index',  'grupo' => 'METODOS DE PAGO', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'metodopagos.create',  'grupo' => 'METODOS DE PAGO', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'metodopagos.edit',  'grupo' => 'METODOS DE PAGO', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'metodopagos.destroy',  'grupo' => 'METODOS DE PAGO', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'pagos.index',  'grupo' => 'PAGOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'pagos.create',  'grupo' => 'PAGOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'pagos.edit',  'grupo' => 'PAGOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'pagos.destroy',  'grupo' => 'PAGOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'lotes.index',  'grupo' => 'LOTES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.create',  'grupo' => 'LOTES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.edit',  'grupo' => 'LOTES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.destroy',  'grupo' => 'LOTES', 'descripcion' => 'Eliminar'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.mislotes',  'grupo' => 'LOTES', 'descripcion' => 'Mis Lotes'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.procesarlote',  'grupo' => 'LOTES', 'descripcion' => 'Procesar lote'])->assignRole([$role]);
        Permission::create(['name' => 'lotes.admlotes',  'grupo' => 'LOTES', 'descripcion' => 'ADM Lotes'])->assignRole([$role]);

        Permission::create(['name' => 'contactos.index',  'grupo' => 'CONTACTOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'contactos.create',  'grupo' => 'CONTACTOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'contactos.edit',  'grupo' => 'CONTACTOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'contactos.destroy',  'grupo' => 'CONTACTOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'resultados.index',  'grupo' => 'TIPO RESULTADOS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'resultados.create',  'grupo' => 'TIPO RESULTADOS', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'resultados.edit',  'grupo' => 'TIPO RESULTADOS', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'resultados.destroy',  'grupo' => 'TIPO RESULTADOS', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'deudores.index',  'grupo' => 'DEUDORES', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        // Permission::create(['name' => 'deudores.create',  'grupo' => 'DEUDORES', 'descripcion' => 'Crear'])->assignRole([$role]);
        Permission::create(['name' => 'deudores.edit',  'grupo' => 'DEUDORES', 'descripcion' => 'Editar'])->assignRole([$role]);
        Permission::create(['name' => 'deudores.destroy',  'grupo' => 'DEUDORES', 'descripcion' => 'Eliminar'])->assignRole([$role]);

        Permission::create(['name' => 'manejodeudas',  'grupo' => 'DEUDAS', 'descripcion' => 'Ver listado'])->assignRole([$role]);
        Permission::create(['name' => 'procesardeuda',  'grupo' => 'DEUDAS', 'descripcion' => 'Procesar deuda'])->assignRole([$role]);
        Permission::create(['name' => 'rpt.compromisos',  'grupo' => 'REPORTES', 'descripcion' => 'Compromisos de Pago'])->assignRole([$role]);
        Permission::create(['name' => 'rpt.contactos',  'grupo' => 'REPORTES', 'descripcion' => 'Contactos'])->assignRole([$role]);
    }
}
