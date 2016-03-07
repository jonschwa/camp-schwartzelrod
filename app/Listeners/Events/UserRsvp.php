<?php namespace App\Listeners\Events;

use Mail;
use App\Events\UserRsvped;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRsvp
{
    protected $user;
    protected $isFirstRsvp;
    protected $isChangedRsvp;
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
        $this->user = $event->user;
        $this->rsvp = $event->rsvp;
        $this->isFirstRsvp = $event->isFirstRsvp;
        $this->isChangedRsvp = $event->isChangedRsvp;

        if($this->isFirstRsvp) {
            \Log::info('handle first rsvp event!');
            $this->sendMailing();
        }
        else {
            \Log::info('not the first rsvp...');
            if($this->isChangedRsvp) {
                \Log::info('sending email for updated rsvp');
                $this->sendMailing();
            }
            else {
                \Log::info('and rsvp hasnt changed');
            }
        }
    }

    private function sendMailing() {
        if($this->rsvp->will_attend == 1) {
            \Log::info('send the RSVP yes email');
            $this->sendRsvpYesEmail();
        }
        elseif($this->rsvp->will_attend == 0) {
            \Log::info('send the RSVP no email');
            $this->sendRsvpNoEmail();
        }
        elseif($this->rsvp->will_attend == -1) {
            \Log::info('send the RSVP maybe email');
            $this->sendRsvpMaybeEmail();
        }
        elseif($this->rsvp->will_attend == -2) {
            \Log::info('notify us that someone wants to opt out.');
            $this->sendOptOutEmail();
        }
    }

    private function sendRsvpYesEmail() {
        $user = $this->user;
        Mail::send('emails.rsvp.yes', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('You RSVPed Yes to Camp Schwartzelrod');
        });
    }

    private function sendRsvpNoEmail() {
        $user = $this->user;
        Mail::send('emails.rsvp.no', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('You RSVPed No to Camp Schwartzelrod');
        });
    }

    private function sendRsvpMaybeEmail() {
        $user = $this->user;
        Mail::send('emails.rsvp.maybe', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('You RSVPed Maybe to Camp Schwartzelrod');
        });
    }

    private function sendOptOutEmail() {
        $user = $this->user;
        Mail::send('emails.rsvp.optout', ['user' => $user], function ($m) use ($user) {
            $m->to('schwartzelrods@gmail.com', 'Camp Schwartzelrod Opt Out Notifications')->subject('Camp Schwartzelrod Opt-Out: '.$user->name . ' has opted out');
        });
    }
}
