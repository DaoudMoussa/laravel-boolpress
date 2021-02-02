<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'categories' => Category::all()
        ];

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newCategory = new Category();
        $newCategory->fill($request->all());
        $newCategory->slug = Str::slug($request->name);

        $newCategory->save();

        $data = [
            'categories' => Category::all()
        ];

        return redirect()->route('admin.categories.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = [
            'category' => $category,
            'posts' => $category->posts
        ];

        return view('admin.categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'category' => $category
        ];

        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $form_data = $request->all();
        $form_data['slug'] = Str::slug($form_data['name']);
        // dd($form_data);
        $category->update($form_data);
        // dd($request->all());
        // $slug = Str::slug($category->name);

        // $category->update($slug);

        // dd($category);
        $data = [
            'category' => $category
        ];

        return redirect()->route('admin.categories.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        foreach ($category->posts as $post) {
            $post->category_id = null;
            $post->update();
        }

        $category->delete();

        $data = [
            'categories' => Category::all()
        ];
        
        return redirect()->route('admin.categories.index', $data);
    }
}
