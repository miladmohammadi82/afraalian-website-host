<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Article as ModelsArticle;
use App\Models\FrontModels\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        //
    }

    public function show($slug)
    {
        $article = Article::with(['comments'=> function($q){
            $q->where('status', 1)
            ->where('parent_id', null);
        }])->where('slug', $slug)->first()->append('is_user_liked');

        // return $article;
        $title = $article->name;

        // return $article;


        $articleCount = $article->likes()->count();

        $articlesNew = Article::orderBy('id', 'DESC')->get();

        return view('front.pages.article', compact('articleCount', 'title', 'article', 'articlesNew'));
    }



}
