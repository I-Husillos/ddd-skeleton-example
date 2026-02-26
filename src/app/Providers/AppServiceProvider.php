<?php

namespace App\Providers;

use DddPrueba\Store\Product\Domain\Product;
use DddPrueba\Store\Product\Domain\ProductRepository;
use DddPrueba\Store\Product\Infrastructure\Persistence\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepository::class,
            EloquentProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
