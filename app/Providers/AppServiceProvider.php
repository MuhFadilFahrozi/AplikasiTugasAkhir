<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\URL; // <--- 1. Tambahkan ini di atas

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app['router']->aliasMiddleware('admin', Admin::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    if (request()->header('x-forwarded-proto') === 'https') {
        URL::forceScheme('https');
    }
}
}