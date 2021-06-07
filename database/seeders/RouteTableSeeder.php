<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 'archivos' FileManager
        // 'usuarios' User
        // 'menus' Menu
        // 'submenus' Route
        // 'roles' Role
        Route::truncate();
        DB::table('routes')->insert([
            ['name' => 'Administrar Usuarios', 'route' => 'usuarios.index'],
            ['name' => 'Administrar Archivos', 'route' => 'archivos.index'],
            ['name' => 'Subir Archivo', 'route' => 'archivos.create'],
            ['name' => 'Administrar Roles', 'route' => 'roles.index'],
            ['name' => 'Agregar Rol', 'route' => 'roles.create'],
            ['name' => 'Administrar Menus', 'route' => 'menus.index'],
            ['name' => 'Agregar Menus', 'route' => 'menus.create'],
            ['name' => 'Administrar SubMenus', 'route' => 'submenus.index'],
            ['name' => 'Agregar SubMenus', 'route' => 'submenus.create']
        ]);
    }
}