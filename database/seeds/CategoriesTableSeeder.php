<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < 10 ; $i++) {
             $newCategory = new Category();
             $newCategory->name = $faker->words(rand(1, 3), true);
             $newCategory->slug = str::slug($newCategory->name);

             $newCategory->save();
         }
     }
}
