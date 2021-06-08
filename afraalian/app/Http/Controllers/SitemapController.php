<?php

namespace App\Http\Controllers;

use App\Models\FrontModels\Article;
use App\Models\FrontModels\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function sitemap()
    {
        $products = Product::all();
        $articles = Article::all();

        return response()->view('front.sitemap', compact('products', 'articles'))->header('Content-Type','text/xml');
    }
}
