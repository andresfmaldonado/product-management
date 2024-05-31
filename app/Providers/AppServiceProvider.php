<?php

namespace App\Providers;

use App\Core\Repositories\CategoryRepository;
use App\Core\Repositories\ProductRepository;
use App\Infraestructure\Repositories\EloquentCategoryRepository;
use App\Infraestructure\Repositories\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepository::class, EloquentProductRepository::class);
        $this->app->bind(CategoryRepository::class, EloquentCategoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
