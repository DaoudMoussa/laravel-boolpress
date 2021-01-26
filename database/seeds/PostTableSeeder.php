<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newPost = new Post();
            // $newPost->header = $faker->realText(rand(50, 200));
            $newPost->header = $faker->realText(50);
            // $newPost->body = $faker->realText(rand(500, 5000));
            $newPost->body = $faker->realText(500);
            $newPost->author = $faker->name;
            $newPost->header = $faker->sentence();
            $newPost->post_date = $faker->date();
            $newPost->save();
        }
    }
}
