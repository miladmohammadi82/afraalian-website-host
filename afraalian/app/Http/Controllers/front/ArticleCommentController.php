<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use App\Models\FrontModels\Article;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $articleId)
    {
        $article = Article::findOrFail($articleId);
        if ($article) {
            $comment = new ArticleComment();
            $comment->body = $request->input('body');
            $comment->name = auth()->user()->name;
            $comment->article_id = $articleId;
            $comment->user_id = auth()->user()->id;
            $comment->save();
        }
        session()->flash('success', 'نظر شما با موفقیت ثبت شد لطفا در انتظار تایید ادمین ها باشید');
        return back();
    }

    public function replay(Request $request)
    {
        $articleId = $request->input('article_id');
        $parentId = $request->input('parent_id');

        $article = Article::findOrFail($articleId);
        if ($article) {
            $comment = new ArticleComment();
            $comment->body = $request->input('body');
            $comment->article_id = $articleId;
            $comment->parent_id = $parentId;
            $comment->name = auth()->user()->name;
            $comment->user_id = auth()->user()->id;
            $comment->save();
        }
        session()->flash('success', 'نظر شما با موفقیت ثبت شد لطفا در انتظار تایید ادمین ها باشید');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleComment $articleComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleComment $articleComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleComment $articleComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleComment  $articleComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleComment $articleComment)
    {
        //
    }
}
