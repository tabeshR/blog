<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $archives = getArchive();
        $best_post = getBestPost();
        return view('singlePost',compact('post','archives','best_post'));
    }
}
