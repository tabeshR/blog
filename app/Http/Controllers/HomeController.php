<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Models\Post::where('confirmed', true)->simplePaginate(3);
        // most viewed post
       $best_post = getBestPost();

        $categories = Category::whereHas('posts')->get()->random(2);
        $archives = getArchive();
        return view('home', ['best_post' => $best_post, 'categories' => $categories, 'archives' => $archives, 'posts' => $posts]);
    }
}
