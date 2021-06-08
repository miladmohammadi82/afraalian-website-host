<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\ArticleComment;
use App\Models\FrontModels\Product;
use App\Models\FrontModels\User;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentProductController extends Controller
{

    public function index(ProductComment $comment, ArticleComment $articleComment)
    {
        // Get Comments Product
        $user_id = auth()->user()->id;
        $comments = $comment->where('user_id', $user_id)->get();

        // Get Comments Article
        $articlesComment = $articleComment->where('user_id', $user_id)->get();

        return view('profile.comment.comments', compact('comments', 'articlesComment'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        if ($product) {
            $comment = new ProductComment();
            $comment->body = $request->input('body');
            $comment->name = auth()->user()->name;
            $comment->product_id = $productId;
            $comment->email = auth()->user()->email;
            $comment->user_id = auth()->user()->id;
            $comment->save();
        }
        session()->flash('success', 'نظر شما با موفقیت ثبت شد لطفا در انتظار تایید ادمین ها باشید');
        return back();
    }

    public function replay(Request $request)
    {
        $productId = $request->input('article_id');
        $parentId = $request->input('parent_id');

        $article = Product::findOrFail($productId);
        if ($article) {
            $comment = new ProductComment();
            $comment->body = $request->input('body');
            $comment->name = auth()->user()->name;
            $comment->parent_id = $parentId;
            $comment->product_id = $productId;
            $comment->email = auth()->user()->email;
            $comment->user_id = auth()->user()->id;
            $comment->save();
        }
        session()->flash('success', 'نظر شما با موفقیت ثبت شد لطفا در انتظار تایید ادمین ها باشید');
        return back();
    }
}
