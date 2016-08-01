<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Repositories\User\UserRepository;

class RsvpConfirmationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:rsvpFinalConfirm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RSVP Confirmation';

    protected $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepository $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $usersToConfirm = $this->user->getUsersWithRsvp();
        foreach($usersToConfirm as $user) {
            if(!is_null($user->email) && $user->is_admin == 0) {

                $userData = $this->addEmailDataForUser($user);
                $this->info($user->email);
                if($this->sendConfirmationEmail($userData)) {
                    unset($user->emailData);
                    $user->rsvp_confirmation = 1;
                    $user->save();
                }
            }
        }
    }

    public function sendConfirmationEmail($user)
    {
        return Mail::send('emails.users.rsvp-confirm', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Camp Schwartzelrod is 6 weeks away!');
            //$m->to('schwartzelrods@gmail.com', $user->name)->subject('Camp Schwartzelrod is 6 weeks away!');
        });
    }

    private function addEmailDataForUser($user) {
        $rsvp = $this->getRsvpLine($user);
        $lodging = $this->getLodgingLine($user);
        $activities = $this->getActivitiesLine($user);
        $bbq = $this->getBbqLine($user);
        $user->emailData = array('rsvp' => $rsvp, 'lodging' => $lodging, 'activities' => $activities, 'bbq' => $bbq);
        return $user;
    }

    private function getRsvpLine($user)
    {
        if ($user->rsvp->will_attend == 1) {
            $rsvp = 'YES';
        } elseif ($user->rsvp->will_attend == -1) {
            $rsvp = 'MAYBE';
        }

        $numAdults = $user->guests->filter(function ($guest) {
            return $guest->is_adult == 1;
        })->count();

        $numKids = $user->guests->filter(function ($guest) {
            return $guest->is_adult == 0;
        })->count();

        $rsvpLine = "You have RSVPed $rsvp";
        if($rsvp == 'YES') {
            if ($numAdults > 0) {
                $rsvpLine .= " for $numAdults adult";
                if($numAdults >1) {
                    $rsvpLine .= "s";
                }
            }
            if ($numKids > 0) {
                $rsvpLine .= " and $numKids children";
            }
        }
        $rsvpLine .= ".";
        return $rsvpLine;
    }

    private function getLodgingLine($user)
    {
        $lodgingLocation = false;
        if ($user->rsvp->will_attend == 1) {
            $firstGuest = $user->guests()->first();
            if($firstGuest->is_staying == 1) {
                $lodgingLocation = 'at camp ';
                if($firstGuest->in_cabin == 1) {
                    $lodgingLocation .= 'in a cabin';
                }
                else {
                    $lodgingLocation .= 'in a BYO shelter';
                }
            }
            else {
                $lodgingLocation = 'off site';
                if(!is_null($firstGuest->hotel_choice)) {
                    if($firstGuest->hotel_choice == 'shore-acres-inn') {
                        $lodgingLocation .= ' at the Shore Acres Inn';
                    }
                    elseif($firstGuest->hotel_choice == 'airbnb') {
                        $lodgingLocation .= ' at an AirBnb';
                    }
                    elseif($firstGuest->hotel_choice == 'north-hero-house') {
                        $lodgingLocation .= ' at North Hero House';
                    }
                }
            }
        }
        return $lodgingLocation;
    }

    private function getActivitiesLine($user) {
        $activities = false;
        if ($user->rsvp->will_attend == 1) {
            $firstUser = $user->guests()->first();
            if($firstUser->fri_camp_activities == 1 && $firstUser->sat_camp_activities == 1) {
                $activities = 'Friday & Saturday';
            }
            elseif($firstUser->fri_camp_activities == 1 && $firstUser->sat_camp_activities == 0) {
                $activities = 'Friday';
            }
            elseif($firstUser->fri_camp_activities == 0 && $firstUser->sat_camp_activities == 1) {
                $activities = 'Saturday';
            }
        }
        return $activities;
    }

    private function getBbqLine($user)
    {
        $bbq = false;
        if ($user->rsvp->will_attend == 1) {
            $firstUser = $user->guests()->first();
            if($firstUser->friday_bbq == 1) {
                $bbq = 'will';
            }
            else {
                $bbq = 'will not';
            }
        }
        return $bbq;
    }
}