<?php

namespace Arc\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Arc\Repositories\IdeaRepository::class, \Arc\Repositories\IdeaRepositoryEloquent::class);
        $this->app->bind(\Arc\Repositories\IdeaLoveRepository::class, \Arc\Repositories\IdeaLoveRepositoryEloquent::class);
        $this->app->bind(\Arc\Repositories\TestRepository::class, \Arc\Repositories\TestRepositoryEloquent::class);
        //:end-bindings:
    }
}
