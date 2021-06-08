<?php

namespace App\Http\Controllers;

use App\Models\FrontModels\Article;
use App\Models\like;
use Illuminate\Http\Request;

class LikePostController extends Controller
{

    public function store(Article $article)
    {
        $article->likes()->toggle(
            auth()->user()->id
        );

        return response(['ok'], 200);
    }

    public function index(like $like, Article $article)
    {
        $likes = $like->where('user_id', auth()->user()->id)->get();


        return $likes;



        $articles = $article->where('id', $likes->article_id)->get();


    }
}
