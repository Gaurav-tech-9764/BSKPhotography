<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            static $settings = null;
            static $socialLinks = null;

            if ($settings === null) {
                try {
                    if (Schema::hasTable('settings')) {
                        $settings = Setting::getAll();
                    } else {
                        $settings = [];
                    }
                } catch (\Exception $e) {
                    $settings = [];
                }
            }

            if ($socialLinks === null) {
                try {
                    if (Schema::hasTable('social_links')) {
                        $socialLinks = SocialLink::active()->orderBy('sort_order')->get();
                    } else {
                        $socialLinks = collect();
                    }
                } catch (\Exception $e) {
                    $socialLinks = collect();
                }
            }

            $view->with('siteSettings', $settings);
            $view->with('socialLinks', $socialLinks);
        });
    }
}
