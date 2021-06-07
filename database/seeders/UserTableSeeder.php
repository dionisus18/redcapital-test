<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        $roleAdmin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
        ]);
        $roleUser = Role::create([
            'name' => 'default',
            'display_name' => 'Usuario',
        ]);
        $roleOp = Role::create([
            'name' => 'op',
            'display_name' => 'Operador',
        ]);
        $roleAdmin->user()->create([
            'name' => 'Kevin',
            'email' => 'kevin@vaporframe.com',
            'password' => bcrypt('123123')
        ]);

        $roleUser->user()->create([
            'name' => 'Juan',
            'email' => 'juan@vaporframe.com',
            'password' => bcrypt('223344')
        ]);

        $roleOp->user()->create([
            'name' => 'Pablo',
            'email' => 'pablo@vaporframe.com',
            'password' => bcrypt('112233')
        ]);
    }
}