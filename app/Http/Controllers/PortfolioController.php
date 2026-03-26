<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioImage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::active()->orderBy('sort_order')->get();
        $query = PortfolioImage::with('category')->whereHas('category', fn($q) => $q->active());

        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $category->id);
        }

        $images = $query->orderBy('sort_order')->paginate(24);
        $activeCategory = $request->category ?? 'all';

        return view('public.portfolio', compact('categories', 'images', 'activeCategory'));
    }

    public function category(Category $category)
    {
        $categories = Category::active()->orderBy('sort_order')->get();
        $images = $category->portfolioImages()->orderBy('sort_order')->paginate(24);
        $activeCategory = $category->slug;

        return view('public.portfolio', compact('categories', 'images', 'activeCategory', 'category'));
    }
}
