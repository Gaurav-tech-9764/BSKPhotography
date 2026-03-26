<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\SettingController;

// =============================================
// PUBLIC ROUTES
// =============================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{category:slug}', [PortfolioController::class, 'category'])->name('portfolio.category');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// =============================================
// AUTH ROUTES
// =============================================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =============================================
// ADMIN ROUTES
// =============================================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('portfolio', AdminPortfolioController::class)->except('show');
    Route::resource('events', AdminEventController::class)->except('show');
    Route::delete('events/image/{image}', [AdminEventController::class, 'deleteImage'])->name('events.delete-image');
    Route::resource('services', AdminServiceController::class)->except('show');

    Route::get('about', [AdminAboutController::class, 'edit'])->name('about.edit');
    Route::post('about', [AdminAboutController::class, 'update'])->name('about.update');

    Route::resource('testimonials', TestimonialController::class)->except('show');
    Route::resource('blog', AdminBlogController::class)->except('show');

    Route::get('inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
    Route::get('inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
    Route::delete('inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    Route::patch('inquiries/{inquiry}/read', [InquiryController::class, 'markAsRead'])->name('inquiries.mark-read');

    Route::resource('social-links', SocialLinkController::class)->except('show');
    Route::resource('banners', BannerController::class)->except('show');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
