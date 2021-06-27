<?php

namespace App\Providers;

use App\Models\Producto;
use App\Observers\ProductosObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Producto::observe(ProductosObserver::class);
    }
}
