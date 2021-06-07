<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MenuTableSeeder;
use Database\Seeders\RouteTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserTableSeeder::class,
            FileManagerTableSeeder::class,
            RouteTableSeeder::class,
            MenuTableSeeder::class,
            AssignedRoutesTableSeeder::class,
        ]);
    }
}