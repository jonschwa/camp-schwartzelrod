<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Repositories\User\UserRepository;

class RsvpReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:rsvpReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all the guests into the database.';

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
                    $user->reminder_1 = 1;
                    $user->save();
                }
                dd('fin');
            }

        }
    }

    public function sendReminderEmail($user)
    {
        return Mail::send('emails.users.rsvp-reminder-1', ['user' => $user], function ($m) use ($user) {
            $m->to('schwartzelrods@gmail.com', $user->name)->subject('Are you coming to our wedding?');
        });
    }
}
