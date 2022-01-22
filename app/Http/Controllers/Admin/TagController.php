<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $tags = Tag::query();
        if ($key = $request->search) {
            $tags->where('name', 'like', "%{$key}%")
                ->orWhere('en_name', 'like', "%{$key}%");
        }
        $tags = $tags->latest()->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>['required',Rule::unique('tags')],
            'en_name'=>['required',Rule::unique('tags')],
        ]);
        Tag::create($data);
        alert()->success('تگ با موفقیت ایجاد شد');
        return redirect(route('admin.tags.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate([
            'name'=>['required',Rule::unique('tags')->ignore($tag->id)],
            'en_name'=>['required',Rule::unique('tags')->ignore($tag->id)],
        ]);
        $tag->update($data);
        alert()->success('تگ با موفقیت ویرایش شد');
        return redirect(route('admin.tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }
}
