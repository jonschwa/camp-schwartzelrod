<?php

namespace App\Handlers\Events;

use Mail;
use App\User;
use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWelcome
{
    protected $user;
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  UserWasCreated  $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $user = $event->user;
        Mail::send('emails.users.welcome', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Welcome to Camp!');
        });
    }
}
