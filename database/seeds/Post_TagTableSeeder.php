<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Post;
use App\Tag;

class Post_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $tagId = 0;
            while(!Tag::all()->pluck('id')->contains($tagId)) {
                $biggestTagId = Tag::orderBy('id', 'desc')->first()->id;
                $tagId = rand(1, $biggestTagId);
            }

            $postId = 0;
            while(!Post::all()->pluck('id')->contains($postId)) {
                $biggestPostId = Post::orderBy('id', 'desc')->first()->id;
                $postId = rand(1, $biggestPostId);
            }

            class Post {
                public $post_id;
                public $tag_id;
            }

            $newAssociation = new Post();
            $newAssociation->tag_id = $tagId;
            $newAssociation->post_id = $postId;

            $newAssociation->save();
        }




        // while(!Category::all()->pluck('id')->contains($newPost->category_id )) {
        //     $lastCategoryObj = Category::orderBy('id', 'desc')->first();
        //     $biggestCategoryId = $lastCategoryObj->id;
        //     $newPost->category_id = rand(1, $biggestCategoryId);
        // }
    }
}
