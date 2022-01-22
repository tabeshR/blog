<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::query();
        if ($key = $request->search) {
            $categories->where('name', 'like', "%{$key}%")
                ->orWhere('en_name', 'like', "%{$key}%")
                ->orWhereHas('child', function ($query) use ($key) {
                    $query->where('name','like',"%{$key}%");
                });
        }
        $categories = $categories->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'=>['required',Rule::unique('categories')],
            'en_name'=>['required',Rule::unique('categories')],
            'parent_id'=>['nullable','exists:categories,id'],
        ]);
        Category::create($data);
        alert()->success('دسته با موفقیت ایجاد شد');
        return redirect(route('admin.categories.index'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'=>['required',Rule::unique('categories')->ignore($category->id)],
            'en_name'=>['required',Rule::unique('categories')->ignore($category->id)],
            'parent_id'=>['nullable','exists:categories,id'],
        ]);
        $category->update($data);
        alert()->success('دسته با موفقیت ویرایش شد');
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
