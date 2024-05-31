<?php

namespace App\Providers;

use App\Core\Repositories\CategoryRepository;
use App\Core\Repositories\PriceListRepository;
use App\Core\Repositories\ProductRepository;
use App\Core\Repositories\UserRepository;
use App\Infraestructure\Repositories\EloquentCategoryRepository;
use App\Infraestructure\Repositories\EloquentPriceListRepository;
use App\Infraestructure\Repositories\EloquentProductRepository;
use App\Infraestructure\Repositories\EloquentUserRepository;
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
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(PriceListRepository::class, EloquentPriceListRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
