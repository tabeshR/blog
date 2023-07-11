<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        if (isset($request->key)) {
            $search = $request->key;
            $posts->where('title', 'like', "%{$search}%")
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        }
        if (isset($request->fromDateDay) && isset($request->fromDateMonth) && isset($request->fromDateYear) && isset($request->toDateDay) && isset($request->toDateMonth) && isset($request->toDateYear)) {
            $request->validate([
                'fromDateDay' => 'integer|min:1|max:31',
                'fromDateMonth' => 'integer|min:1|max:12',
                'fromDateYear' => 'integer|min:1400|max:1500',
                'toDateDay' => 'integer|min:1|max:31',
                'toDateMonth' => 'integer|min:1|max:12',
                'toDateYear' => 'integer|min:1400|max:1500',
            ]);
            $fromDateArray = array_reverse(jalali_to_gregorian($request->fromDateYear,$request->fromDateMonth,$request->fromDateDay));
            $fromDate = Carbon::parse(implode('-',$fromDateArray));

            $toDateArray = array_reverse(jalali_to_gregorian($request->toDateYear,$request->toDateMonth,$request->toDateDay));
            $toDate = Carbon::parse(implode('-',$toDateArray));
            $posts = $posts->whereBetween('created_at',[$fromDate,$toDate]);
        }
        $posts = $posts->latest()->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'confirmed' => ['required', Rule::in(0, 1)]
        ]);
        $request->user()->posts()->create(array_merge($request->all(), [
            'month' => jdate(Carbon::now())->format('%B'),
            'year' => jdate(Carbon::now())->format('Y'),
        ]));
        session()->flash('insert-success', true);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'confirmed' => ['required', Rule::in(0, 1)]
        ]);
        $post->update(array_merge($request->all(), [
            'month' => jdate(Carbon::now())->format('%B'),
            'year' => jdate(Carbon::now())->format('Y'),
        ]));
        session()->flash('update-success', true);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        session()->flash('delete-success', true);
        return back();
    }
}
