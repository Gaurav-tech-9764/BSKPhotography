<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // On Hostinger, public_html is the web root instead of public/
        if (is_dir(base_path('../public_html'))) {
            $this->app->bind('path.public', function () {
                return base_path('../public_html');
            });
        }
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
    }
}
