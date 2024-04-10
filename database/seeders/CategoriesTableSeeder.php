<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Category::create([
                'name' => $faker->word,
            ]);
        }
    }
}

