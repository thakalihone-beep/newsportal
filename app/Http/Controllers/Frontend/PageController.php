<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;

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

        public function category ($slug){
            $category = Category::where("slug", $slug)->where("status", true)->first();
            $advertise = Advertise::where("expire_date", ">=", date("Y-m-d"))->get();
            return view ("frontend.category", compact("category", "advertise"));
        }

        public function article ($slug){
            $article = Article::where("slug", $slug)->where("status", true)->first();
            $advertise = Advertise::where("expire_date", ">=", date("Y-m-d"))->get();
            return view ("frontend.article", compact("article", "advertise"));
        }


}
