<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::query();
        if ($key = $request->search) {
            $posts->where('title', 'like', "%{$key}%")
                ->orWhere('body', 'like', "%{$key}%")
                ->orWhere('en_body', 'like', "%{$key}%")
                ->orWhere('en_title', 'like', "%{$key}%")
                ->orWhereHas('category', function ($query) use ($key) {
                  $query->where('name','like',"%{$key}%")->orWhere('en_name','like',"%{$key}%");
                });
        }
        $posts = $posts->orderByDesc('pin')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'en_title'=>'nullable|string|max:255',
            'en_body'=>'nullable|string|max:1000',
            'published_at' => 'nullable|string',
            'tags' => 'nullable|array'
        ]);
        if(isset($request->pin)){
            $data['pin'] = true;
        }else{
            $data['pin'] = false;
        }
        if($data['published_at']){
            $publish_at = faTOen($data['published_at']);

            $publish_at_array = explode('/',$publish_at);
            $year = $publish_at_array[0];
            $month = $publish_at_array[1];
            $day = $publish_at_array[2];
            $publish_at = (new Jalalian($year,$month,$day))->toCarbon()->toDateTimeString();
            if($publish_at < now()){
                alert()->error('تاریخ وارد شده معتبر نمیباشد');
                return back();
            }
            $data['published_at'] = $publish_at;
        }

        $post = auth()->user()->posts()->create($data);
        $post->tags()->sync($data['tags']);
        alert()->success('پست جدید ایجاد شد');
        return redirect(route('admin.posts.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $publish_at = null;
        if($post->published_at){
            $publish_at = $post->published_at;
            $publish_at_array = explode(' ',$publish_at);
            $publish_at = $publish_at_array[0];
            $publish_at_array = explode('-',$publish_at);
            $year = intval($publish_at_array[0]);
            $month = intval($publish_at_array[1]);
            $day = intval($publish_at_array[2]);
            $publish_at = \Morilog\Jalali\CalendarUtils::toJalali($year, $month, $day);
            $publish_at = implode('/',$publish_at);
            $publish_at = enToFa($publish_at);
        }
        return view('admin.posts.edit', compact('post','publish_at'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:1000',
            'en_title'=>'nullable|string|max:255',
            'en_body'=>'nullable|string|max:1000',
            'published_at' => 'nullable|string',
            'tags' => 'nullable|array'
        ]);

        if(isset($request->pin)){
            $data['pin'] = true;
        }else{
            $data['pin'] = false;
        }
        if($data['published_at']){
            $publish_at = faTOen($data['published_at']);

            $publish_at_array = explode('/',$publish_at);
            $year = $publish_at_array[0];
            $month = $publish_at_array[1];
            $day = $publish_at_array[2];
            $publish_at = (new Jalalian($year,$month,$day))->toCarbon()->toDateTimeString();

            if($publish_at !== $post->published_at && $publish_at < now()){
                alert()->error('تاریخ وارد شده معتبر نمیباشد');
                return back();
            }
            $data['published_at'] = $publish_at;
        }

        $post->update($data);
        $post->tags()->sync($data['tags']);
        alert()->success('پست شما ویرایش شد');
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
