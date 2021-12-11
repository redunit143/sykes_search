<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoriesRepository;
use App\Repositories\CategoriesRepositoryInterface;
use App\Repositories\ProductsRepository;
use App\Repositories\ProductsRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\PropertyRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class, CategoriesRepository::class);
    }
}
