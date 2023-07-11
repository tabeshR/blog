<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function getPosts($month, $year)
    {
        $posts = Post::where('month',$month)->where('year',$year)->simplePaginate(5);
        $archives = getArchive();
        $best_post = getBestPost();
        return view('posts',compact('posts','archives','best_post'));
    }
}
