<?php

namespace App\Listeners;

use Mail;
use App\Events\UserRsvped;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;

class UserRsvp
{
    protected $user;
    protected $rsvp;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRsvped  $event
     * @return void
     */
    public function handle(UserRsvped $event)
    {
        //
    }
}
