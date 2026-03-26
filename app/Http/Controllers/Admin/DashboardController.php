<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\ContactInquiry;
use App\Models\Event;
use App\Models\PortfolioImage;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => Category::count(),
            'portfolio_images' => PortfolioImage::count(),
            'events' => Event::count(),
            'services' => Service::count(),
            'testimonials' => Testimonial::count(),
            'blog_posts' => BlogPost::count(),
            'banners' => Banner::count(),
            'inquiries' => ContactInquiry::count(),
            'unread_inquiries' => ContactInquiry::unread()->count(),
        ];

        $recentInquiries = ContactInquiry::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries'));
    }
}
