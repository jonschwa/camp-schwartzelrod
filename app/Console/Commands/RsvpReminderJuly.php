<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Repositories\User\UserRepository;

class RsvpReminderJuly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:rsvpReminderJuly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '2nd Rsvp Reminder';

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
        $usersToRemind = $this->user->getUsersWithNoRsvp();
        foreach($usersToRemind as $user) {
            if(!is_null($user->email) && $user->is_admin == 0) {
                $this->info($user->email);
                if($this->sendReminderEmail($user)) {
                    $user->reminder_2 = 1;
                    $user->save();
                }
            }
        }
    }

    public function sendReminderEmail($user)
    {
        return Mail::send('emails.users.rsvp-reminder-2', ['user' => $user], function ($m) use ($user) {
            //$m->to($user->email, $user->name)->subject('RSVP to our wedding by August 1st!');
            $m->to('schwartzelrods@gmail.com', $user->name)->subject('RSVP to our wedding by August 1st!');
        });
    }
}
