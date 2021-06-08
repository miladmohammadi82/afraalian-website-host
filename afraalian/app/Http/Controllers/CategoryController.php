<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "دسته بندی ها";
        $categories = Category::orderBy('id', 'DESC')->get();

        $parentCategories = Category::where('parent_id', null)->pluck('title');

        return view('back.pages.categories', compact('categories', 'title', 'parentCategories'));
    }

    public function get_category($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    public function addNewCategory()
    {
        $title = "افزودن دسته بندی جدید";
        $parentCategories = Category::where('parent_id', null)->get();

        return view('back.pages.addNew-category', compact('title', 'parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Code...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        $message = [
            'title.required'=>'فیلد عنوان نمیتواند خالی باشد',
            'title.unique'=>'این عنوان از قبلا وجود دارد',
            'title.slug'=>'این عنوان از قبلا وجود دارد',
            'description.required'=>'فیلد توضیحات نمیتواند خالی باشد',
        ];

        $validatedData = $request->validate([
            'title' => ['required', 'unique:categories'],
            'description' => ['required'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ], $message);



        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->parent_id = $request->input('parent_id');

        $category->save();

        session()->flash('success', 'دسته بندی با موفقیت ایجاد شد.');
        return redirect(route('showCategories.admin.panel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = "ویرایش دسته بندی";
        return view('back.pages.edit-category', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $message = [
            'title.required'=>'فیلد عنوان نمیتواند خالی باشد',
            'title.unique'=>'این عنوان از قبلا وجود دارد',
            'slug.required'=>'فیلد عنوان لینک خالی باشد',
            'description.required'=>'فیلد توضیحات نمیتواند خالی باشد',
        ];
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'slug' => ['required'],
            'active' => ['required', 'numeric'],
        ], $message);

        $category->update($request->all());

        session()->flash('success', 'ویرایش با موفقیت انجام شد.');
        return redirect(route('showCategories.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        session()->flash('success', 'کاربر با موفثیت حذف شد');
        return redirect(route('showCategories.admin.panel'));
    }

    public function editActive(Category $category)
    {
        if ($category->active == 0) {
            $category->active = 1;
        }else{
            $category->active = 0;
        }

        $category->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('showCategories.admin.panel'));
    }
}
