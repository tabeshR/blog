<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function posts(Category $category)
    {
        $posts = $category->posts()->simplePaginate(5);
        $archives = getArchive();
        $best_post = getBestPost();
        return view('posts',compact('posts','best_post','archives'));
    }
}
