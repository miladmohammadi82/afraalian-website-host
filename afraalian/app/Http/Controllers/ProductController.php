<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "مدیریت محصولات";
        $products = Product::orderBy('id', "DESC")->get();
        return view('back.pages.products', compact('title', 'products'));
    }

    public function newProductPage()
    {
        $title = "افزودن محصول جدید";
        $categories = Category::all()->pluck('title', 'id');
        return view('back.pages.new-product', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $message = [
            'name.required'=>'فیلد عنوان نمیتواند خالی باشد',
            'name.unique'=>'این عنوان از قبلا وجود دارد',
            'slug.required'=>'فیلد نام مستعار نمیتواند خالی باشد',
            'slug.unique'=>'این نام مستعار از قبل وجود دارد',
            'price.required'=>'فیلد قیمت نمیتواند خالی باشد',
            'description.required'=>'فیلد توضیحات نمیتواند خالی باشد',
            'index_image.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery1.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery2.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery3.required'=>'لطفا یه عکس انتخاب کنید',
        ];

        $request->validate([
            'name' => ['required', 'unique:products'],
            'price' => ['required'],
            'description' => ['required'],
            'index_image' =>['required'],
            'image_gallery1' => ['required'],
            'image_gallery2' => ['required'],
            'image_gallery3' => ['required'],
        ], $message);

        if(empty($request->slug)){
            $slug = SlugService::createSlug(Product::class, 'slug', $request->name);
        }else{
            $slug = SlugService::createSlug(Product::class, 'slug', $request->slug);
        }

        $request->merge(['slug' => $slug]);

        $product = $product->create($request->all());
        $product->categories()->attach($request->categories);
        session()->flash('success', 'محصول ایجاد شد .');
        return redirect(route('products.admin.panel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = "ویرایش محصول $product->name";
        $categories = Category::all()->pluck('title', 'id');
        return view('back.pages.edit-product', compact('product', 'title', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $message = [
            'name.required'=>'فیلد عنوان نمیتواند خالی باشد',
            'name.exists'=>'این عنوان از قبلا وجود ندارد',
            'slug.required'=>'فیلد نام مستعار نمیتواند خالی باشد',
            'slug.exists'=>'این نام مستعار از قبل وجود ندارد',
            'price.required'=>'فیلد قیمت نمیتواند خالی باشد',
            'description.required'=>'فیلد توضیحات نمیتواند خالی باشد',
            'index_image.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery1.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery2.required'=>'لطفا یه عکس انتخاب کنید',
            'image_gallery3.required'=>'لطفا یه عکس انتخاب کنید',
        ];

        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'index_image' =>['required'],
            'image_gallery1' => ['required'],
            'image_gallery2' => ['required'],
            'image_gallery3' => ['required'],
        ]);

        $product->update($request->all());
        $product->categories()->attach($request->categories);

        session()->flash('success', "تقییرات انجام شد.");
        return redirect(route('products.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        session()->flash('success', "محصول حذف شد.");
        return redirect(route('products.admin.panel'));
    }

    public function editActive(Product $product)
    {
        if ($product->active == 0) {
            $product->active = 1;
        }else{
            $product->active = 0;
        }

        $product->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('products.admin.panel'));
    }
}
