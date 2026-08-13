<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where('status', true)->get();
        view()->share([
            "categories" => $categories
        ]);
    }
    public function home()
    {
        $latest_articles = Article::where('status', true)
            ->with('categories')
            ->latest()
            ->take(9)
            ->get();

        return view('frontend.home', compact('latest_articles'));
    }
}
