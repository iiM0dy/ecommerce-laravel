<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\View;

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
         View::composer('*', function ($view) {
        $count = auth()->check() ? Cart::where('user_id', auth()->id())->count() : 0;

        $view->with('cartCount', $count);
    });
    }
}
