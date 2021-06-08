<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\FrontModels\Category;
use App\Models\FrontModels\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "صفحه اصلی";


        // $id = DB::table('category_product')->where('product_id', '=' , 'category_id');


        $category = Category::findOrFail(2);
        $products = $category->products()->get();

        $categoryPorbazdid = Category::findOrFail(1);
        $productsporbazdid = $categoryPorbazdid->products()->get();

        $articleCategory = Category::findOrFail(22);
        $articlesPorbazdid = $articleCategory->article()->get()->append('is_user_liked');


        return view('front.main', compact(
            'title',
            'products',
            'productsporbazdid',
            'articlesPorbazdid',
        ));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")->get();

        $count = $products->count();

        return view('front.pages.search-result', compact('products', 'count'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, ProductComment $productComment)
    {
        $title = $product->name;

        $products = Product::with(['comments'=> function($q){
            $q->where('status', 1)
            ->where('parent_id', null);

        }])->where('slug', $product->slug)->get();

        // return $products;

        return view('front.pages.productPage', compact('products', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
