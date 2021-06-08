<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FrontModels\Article as FrontModelsArticle;
use App\Models\FrontModels\Category;
use App\Models\FrontModels\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "مدیریت  مطالب";
        $articles = Article::orderBy('id', 'DESC')->get();

        return view('back.pages.articles.articles', compact('articles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "افرودن مطلب جدید";
        $categories = Category::all()->pluck('title', 'id');
        return view('back.pages.articles.new-articles', compact('categories', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'slug' => ['unique:articles'],
            'description' => ['required'],
            'user_id' => ['required', 'numeric'],
            'hit' => ['required', 'numeric'],
            'categories' => ['required'],
            'index_image' => ['required'],
            
        ]);

        $article = Article::create($request->all());
        $article->categories()->attach($request->categories);

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('articles.admin.panel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $articles)
    {
        $title = "ویرایش مطلب";
        $categories = Category::all()->pluck('title', 'id');
        return view('back.pages.articles.edit-articles', compact('articles', 'categories', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'name' => ['required'],
            'slug' => ['required', 'exists:articles'],
            'description' => ['required'],
            'user_id' => ['required', 'numeric'],
            'hit' => ['required', 'numeric'],
            'index_image' => ['required'],
        ]);

        $article->update($request->all());
        $article->categories()->attach($request->categories);

        session()->flash('success', 'تغییرات با موفقیت انجام شد.');
        return redirect(route('articles.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('articles.admin.panel'));

    }

    public function editStatus($id)
    {
        $article = Article::findOrFail($id);


        if ($article->status == 0) {
            $article->status = 1;
        }else{
            $article->status = 0;
        }

        $article->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('articles.admin.panel'));
    }
}
