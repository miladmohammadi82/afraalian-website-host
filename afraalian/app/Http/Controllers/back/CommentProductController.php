<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\ProductComment;
use Illuminate\Http\Request;

class CommentProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "ُمدیریت کامت های محصولات";
        $product_comments = ProductComment::orderBy('id', 'DESC')->get();

        return view('back.pages.comments.comments', compact('title','product_comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductComment $comment)
    {
        $title = "ویرایش کامت";
        return view('back.pages.comments.edit-comment', compact('comment', 'title'));
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
        $ProductComment = ProductComment::findOrFail($id);

        $message = [
            'name.required'=>'فیلد نام نمیتواند خالی باشد',
            'name.email'=>'فیلد ایمیل نمیتواند خالی باشد',
            'name.body'=>'فیلد نظر نمیتواند خالی باشد',
        ];

        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'body' => ['required'],
        ], $message);


        $ProductComment->update($request->all());


        session()->flash('success', "تقییرات انجام شد.");
        return redirect(route('products-comment.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ProductComment = ProductComment::findOrFail($id);

        $ProductComment->delete();

        session()->flash('success', 'کاربر با موفثیت حذف شد');
        return redirect(route('products-comment.admin.panel'));
    }

    public function editActive($id)
    {
        $ProductComment = ProductComment::findOrFail($id);

        if ($ProductComment->status == 0) {
            $ProductComment->status = 1;
        }else{
            $ProductComment->status = 0;
        }

        $ProductComment->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('products-comment.admin.panel'));
    }
}
