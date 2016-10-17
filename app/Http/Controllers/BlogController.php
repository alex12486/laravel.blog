<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    public function getSingle($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('blog/single')->with('post', $post);
    }
    public function getIndex(){

        $posts = Post::paginate(10);
        return view('blog/index')->with('posts', $posts);
    }
}
