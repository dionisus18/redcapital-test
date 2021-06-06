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
        Role::create([
            'name' => 'default',
            'display_name' => 'Sin Asignar',
        ]);
        $roleOp = Role::create([
            'name' => 'op',
            'display_name' => 'Operador',
        ]);

        $userAdmin = User::create([
            'name' => 'Kevin',
            'email' => 'kevin@vaporframe.com',
            'password' => bcrypt('123123')
        ]);
        $userOp = User::create([
            'name' => 'Juan',
            'email' => 'juan@vaporframe.com',
            'password' => bcrypt('223344')
        ]);

        // $userAdmin->role()->save($roleAdmin);
        $roleOp->user()->save($userOp);
        $roleAdmin->user()->save($userAdmin);
    }
}
