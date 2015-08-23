<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\EloquentUserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserRepository', function($app)
        {
            return new EloquentUserRepository(new User);
        });
    }
}
