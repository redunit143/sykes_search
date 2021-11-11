<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
    }
}
