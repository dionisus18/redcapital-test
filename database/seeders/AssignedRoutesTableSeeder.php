<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssignedRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assigned_routes')->truncate();
        $menu = Menu::find(1);
        $menu->routes()->attach([2,3]);
        $menu = Menu::find(2);
        $menu->routes()->attach([2,3]);
        $menu = Menu::find(3);
        $menu->routes()->attach([6,7,8,9]);
    }
}