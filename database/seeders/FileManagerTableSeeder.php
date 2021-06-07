<?php

namespace Database\Seeders;

use App\Models\FileManager;
use Illuminate\Database\Seeder;

class FileManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FileManager::truncate();
        FileManager::factory()->count(3)->create();
        FileManager::factory()->count(10)->create([
            'user_id' => '2',
        ]);
    }
}
