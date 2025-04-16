<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newDish = new Dish();

            $newDish->name = $faker->sentence(4);
            $newDish->description = $faker->text();
            $newDish->price = $faker->randomFloat(2, 0, 100);
            $newDish->category_id = random_int(1, 4);

            $newDish->save();
        }
    }
}
