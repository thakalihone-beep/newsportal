<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $categories = Category::where('status', true)->get();
        view()->share([
            'categories' => $categories,
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

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('status', true)->first();
        $advertise = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();

        return view('frontend.category', compact('category', 'advertise'));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->where('status', true)->first();
        $advertise = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();

        return view('frontend.article', compact('article', 'advertise'));
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        $articles = Article::query()
            ->where('status', true)
            ->when($query !== '', function ($queryBuilder) use ($query) {
                $queryBuilder->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                });
            })
            ->with('categories')
            ->latest()
            ->get();

        $advertise = Advertise::where('expire_date', '>=', date('Y-m-d'))->get();

        return view('frontend.search', compact('articles', 'advertise', 'query'));
    }
}
