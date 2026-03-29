<?php

namespace App\Providers;

use App\Repositories\CategoriesProduct\CategoriesRepository;
use App\Repositories\CategoriesProduct\Interface\CategoriesRepositoryInterface;
use App\Repositories\Items\Interface\ItemRepositoryInterface;
use App\Repositories\Items\ItemRepository;
use App\Repositories\Product\Interface\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Store\Interface\StoreRepositoryInterface;
use App\Repositories\Store\StoreRepository;
use App\Repositories\Users\Interface\UserRepositoryInterface;
use App\Repositories\Users\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repository
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);



    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
