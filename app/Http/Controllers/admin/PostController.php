<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;
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
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required|max:100',
            'body' => 'required',
            'author' => 'required|max:100',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]);

        $newPost = new Post();
        $newPost->fill($request->all());

        $newPost->post_date = date('Y-m-d');

        $slug = Str::slug($request->header);
        $baseSlug = $slug;

        $currentPost = Post::where('slug', $slug)->first();
        $counter = 1;

        while ($currentPost) {
            $slug = $baseSlug . '-' . $counter;
            $currentPost = Post::where('slug', $slug)->first();
            $counter++;
        }

        $newPost->slug = $slug;
        $newPost->save();


        $newPost->tags()->sync($request->tags);

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
            'post' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all()
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
            $request->validate([
                'header' => 'required|max:100',
                'body' => 'required',
                'author' => 'required|max:100',
                'category_id' => 'nullable|exists:categories,id',
                'tags' => 'exists:tags,id'
            ]);
            $form_data = $request->all();

            $slug = Str::slug($request->header);
            $baseSlug = $slug;

            $currentPost = Post::where('slug', $slug)->first();
            $counter = 1;

            while ($currentPost) {
                $slug = $baseSlug . '-' . $counter;
                $currentPost = Post::where('slug', $slug)->first();
                $counter++;
            }

            $form_data['slug'] = $slug;

            $post->update($form_data);
            $post->tags()->sync($request->tags);

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
            $post->tags()->sync([]);
            $post->delete();

            return redirect()->route('admin.posts.index');
        } else {
            abort(404);
        }
    }
}
