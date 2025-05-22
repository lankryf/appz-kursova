<?php

namespace App\Providers;

use App\Repositories\OrderRepository\OrderRepository;
use App\Repositories\OrderRepository\OrderRepositoryContract;
use App\Repositories\RoleRepository\RoleRepository;
use App\Repositories\RoleRepository\RoleRepositoryContract;
use App\Repositories\UserRepository\UserRepository;
use App\Repositories\UserRepository\UserRepositoryContract;
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
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
    }
}
