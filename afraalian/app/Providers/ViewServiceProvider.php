<?php

namespace App\Providers;

use App\Models\FrontModels\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::with('children')->where('parent_id', null)->get();

        View::composer('front.navbar', function($view) use($categories){
            $view->with('categories', $categories);
        });


        $articleCategory = Category::findOrFail(22);

        $articlesPorbazdid = $articleCategory->article()->get();

        View::composer('front.footer', function($view) use($articlesPorbazdid){
            $view->with('articlesPorbazdid', $articlesPorbazdid);
        });


    }
}
