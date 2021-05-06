<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Posts;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Posts::orderBy('created_at', 'desc')->paginate(4);
        // $tags = Tags::orderBy('created_at', 'desc')->get();

        return view('blog', compact('posts'));
    }
}
