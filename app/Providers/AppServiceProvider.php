<?php

namespace App\Providers;

use App\Http\Data\Interface\AddableRepositoryInterface;
use App\Http\Data\Interface\BasketRepositoryInterface;
use App\Http\Data\Interface\ItemRepositoryInterface;
use App\Http\Data\Repository\AddableRepository;
use App\Http\Data\Repository\BasketRepository;
use App\Http\Data\Repository\ItemRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AddableRepositoryInterface::class, AddableRepository::class);
        $this->app->bind(BasketRepositoryInterface::class, BasketRepository::class);
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
