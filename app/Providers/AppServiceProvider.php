<?php

namespace App\Providers;

use Akaunting\Money\Currency;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        if (! $this->app->runningUnitTests()) {
            Currency::mixin(resolve(\App\Currency::class));
        }
    }
}
