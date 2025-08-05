<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\Components\ToggleCompletedButton;
use Illuminate\Support\Facades\Blade;


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
    public function boot()
    {
        Blade::component('toggle-completed-button', ToggleCompletedButton::class);
    }
}
