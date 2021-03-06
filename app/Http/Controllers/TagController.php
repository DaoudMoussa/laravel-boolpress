<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    public function index() {
        $data = [
            'tags' => Tag::all()
        ];

        return view('guest.tags.index', $data);
    }

    public function show($slug) {
        $tag = Tag::where('slug', $slug)->first();

        $data = [
            'tag' => $tag
        ];

        return view('guest.tags.show', $data);
    }
}
