<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class CommentArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "دسته بندی نظرات محصولات";
        $comments = ArticleComment::with(['article', 'user'])->orderBy('id', 'DESC')->get();
        return view('back.pages.articleComment.comments', compact('comments', 'title'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $ProductComment = ArticleComment::findOrFail($comment);

        $ProductComment->delete();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('comments.article.admin.panel'));
    }

    public function editStatus($comment)
    {
        $ArticleComment = ArticleComment::findOrFail($comment);

        if ($ArticleComment->status == 0) {
            $ArticleComment->status = 1;
        }else{
            $ArticleComment->status = 0;
        }

        $ArticleComment->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('comments.article.admin.panel'));
    }
}
