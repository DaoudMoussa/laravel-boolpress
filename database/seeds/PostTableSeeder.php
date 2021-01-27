<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\Category;

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
            $newPost->header = $faker->realText(rand(50, 200));
            // $newPost->header = $faker->realText(50);
            $newPost->body = $faker->realText(rand(500, 5000));
            // $newPost->body = $faker->realText(500);

            while(!Category::all()->pluck('id')->contains($newPost->category_id )) {
                $lastCategoryObj = Category::orderBy('id', 'desc')->first();
                $biggestCategoryId = $lastCategoryObj->id;
                $newPost->category_id = rand(1, $biggestCategoryId);
            }
            $newPost->author = $faker->name;
            $newPost->header = $faker->sentence();
            $newPost->post_date = $faker->date();

            $slug = Str::slug($newPost->header);
            $currentPost = Post::where('slug', $slug)->first();

            $counter = 1;
            while($currentPost) {
                $slug = $slug . '-' . $counter;
                $counter++;
                $currentPost = Post::where('slug', $slug)->first();
            }

            $newPost->slug = $slug;
            $newPost->save();
        }
    }
}
