<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
            return new \App\Repositories\User\EloquentUserRepository(new \App\User);
        });

        $this->app->bind('App\Repositories\Invitation\InvitationRepository', function($app)
        {
            return new \App\Repositories\Invitation\EloquentInvitationRepository(new \App\Invitation);
        });

        $this->app->bind('App\Repositories\Guest\GuestRepository', function($app)
        {
            return new \App\Repositories\Guest\EloquentGuestRepository(new \App\Guest);
        });

        $this->app->bind('App\Repositories\Rsvp\RsvpRepository', function($app)
        {
            return new \App\Repositories\Rsvp\EloquentRsvpRepository(new \App\Rsvp);
        });
    }
}
