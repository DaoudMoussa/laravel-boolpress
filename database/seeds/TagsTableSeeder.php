<?php

use Illuminate\Database\Seeder;

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
            $newTag = new Tag();
            $newTag->name = $faker->words(rand(1, 3), true);
            $newTag->slug = str::slug($newTag->name);

            $newTag->save();
        }
    }
}
