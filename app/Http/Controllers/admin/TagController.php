<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'tags' => Tag::all()
        ];

        return view('admin.tags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTag = new Tag();
        $newTag->fill($request->all());
        $newTag->slug = Str::slug($request->name);

        $newTag->save();

        $data = [
            'tags' => Tag::all()
        ];

        return redirect()->route('admin.tags.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $data = [
            'tag' => $tag,
        ];

        return view('admin.tags.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $data = [
            'tag' => $tag
        ];

        return view('admin.tags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $form_data = $request->all();
        $form_data['slug'] = Str::slug($form_data['name']);

        $tag->update($form_data);

        $data = [
            'tag' => $tag
        ];

        return redirect()->route('admin.tags.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->posts()->sync([]);

        $tag->delete();

        $data = [
            'tags' => Tag::all()
        ];

        return redirect()->route('admin.tags.index', $data);
    }
}
