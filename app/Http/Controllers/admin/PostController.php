<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'posts' => Post::all()
        ];

        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPost = new Post();
        $newPost->fill($request->all());

        $newPost->post_date = date('Y-m-d');

        $slug = Str::slug($request->header);
        // $slug = $newPost->header;

        $currentPost = Post::where('slug', $slug)->first();
        $counter = 1;

        while ($currentPost) {
            $slug = $slug . '-' . $counter;
            $currentPost = Post::where('slug', $slug)->first();
            $counter++;
        }

        $newPost->slug = $slug;

        $newPost->save();

        return redirect()->route('admin.posts.show', [ 'post' => $newPost->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data = [
            'post' => $post
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'post' => $post
        ];

        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post) {
            $post->update($request->all());

            $slug = Str::slug($request->header);
            $currentPost = Post::where('slug', $slug)->first();
            $counter = 1;

            while ($currentPost) {
                $slug = $slug . '-' . $counter;
                $currentPost = Post::where('slug', $slug)->first();
                $counter++;
            }

            $post->slug = $slug;

            return redirect()->route('admin.posts.show', [ 'post' => $post->id ]);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post) {
            $post->delete();

            return redirect()->route('admin.posts.index');
        } else {
            abort(404);
        }
    }
}
