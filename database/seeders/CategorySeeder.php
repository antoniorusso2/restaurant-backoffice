<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $categories = [
            'Appetizers',
            'Entrees',
            'Desserts',
            'Drinks',
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();

            $newCategory->name = $category;
            $newCategory->color = $faker->hexColor();
            $newCategory->save();
        }
    }
}
