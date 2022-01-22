<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private function getLang($request)
    {
        $path = $request->getQueryString();
        $lang = 'fa';
        if (Str::contains($path, ['lang=en'])) {
            $lang = 'en';
        }
        return $lang.'.';
    }

    public function index(Request $request)
    {
        $posts = Post::orderBy('pin', 'desc')->latest()->paginate(10);
        $lang = $this->getLang($request);
        return view($lang . 'posts.index', compact('posts'));
    }

    public function single(Request $request, Post $post)
    {
        $lang = $this->getLang($request);
        return view($lang . 'posts.single', compact('post'));
    }

    public function showByCategory(Request $request, Category $category)
    {
        $lang = $this->getLang($request);
        $posts = $category->posts()->latest()->paginate(10);
        return view($lang . 'posts.index', compact('posts'));
    }

    public function showByTags(Request $request, Tag $tag)
    {
        $lang = $this->getLang($request);
        $posts = $tag->posts()->latest()->paginate(10);
        return view($lang . 'posts.index', compact('posts'));
    }

    public function showByDate(Request $request, $date)
    {
        $lang = $this->getLang($request);
        $posts = Post::where('created_at','>=', $date.'-1'.'-1')->where('created_at','<', ($date+1).'-1'.'-1')->latest()->paginate(10);
        return view($lang . 'posts.index', compact('posts'));
    }
}
