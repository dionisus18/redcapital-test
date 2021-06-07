<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\FileManager;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileManagerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FileManager::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'note' => $this->faker->text(),
            'name' => $this->faker->streetName().".".$this->faker->fileExtension(),
            'path' => "public/".Str::random(10).".".$this->faker->fileExtension()
        ];
    }
}