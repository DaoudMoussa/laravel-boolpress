<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::all();

        return response()->json([
            'success' => true,
            'response' => $posts
        ]);
    }
}
