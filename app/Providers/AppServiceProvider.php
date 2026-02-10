<?php

namespace App\Providers;

use App\Repositories\Items\Interface\ItemRepositoryInterface;
use App\Repositories\Items\ItemRepository;
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
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
