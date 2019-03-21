<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::publishid->paginate();
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }
}
