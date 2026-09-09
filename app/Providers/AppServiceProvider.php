<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // توافق الجداول مع MySQL
        Schema::defaultStringLength(191);

        // إجبار Laravel على استخدام HTTPS في الإنتاج
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}