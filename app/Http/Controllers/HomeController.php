<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\PortfolioImage;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\BlogPost;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::active()->orderBy('sort_order')->get();
        $categories = Category::active()->orderBy('sort_order')->get();
        $featuredImages = PortfolioImage::featured()->with('category')->latest()->take(12)->get();
        $services = Service::active()->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::active()->orderBy('sort_order')->get();
        $recentPosts = BlogPost::published()->latest('published_at')->take(3)->get();

        return view('public.home', compact('banners', 'categories', 'featuredImages', 'services', 'testimonials', 'recentPosts'));
    }
}
