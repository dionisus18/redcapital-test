<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        $role = Role::find(2);

        $role->menu()->create([
            'name' => 'Gestion de archivos',
        ]);

        $role = Role::find(3);

        $role->menu()->create([
            'name' => 'Personal',
        ]);
        $role->menu()->create([
            'name' => 'Gestion de Menus',
        ]);
    }
}