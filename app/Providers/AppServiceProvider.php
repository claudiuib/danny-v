<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
       // Force HTTPS when behind reverse proxy
        // if (config('app.env') === 'production' || request()->header('X-Forwarded-Proto') === 'https') {
        //     URL::forceScheme('https');
        // }
        
        // // Trust proxy headers for proper HTTPS detection
        // if (request()->header('X-Forwarded-For') || request()->header('X-Forwarded-Proto')) {
        //     request()->setTrustedProxies(['*'], 
        //         \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR |
        //         \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST |
        //         \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT |
        //         \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO |
        //         \Illuminate\Http\Request::HEADER_X_FORWARDED_AWS_ELB
        //     );
        // }
    }
}
