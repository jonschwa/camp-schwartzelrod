<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //\App\Console\Commands\Inspire::class,
        \App\Console\Commands\ImportGuests::class,
        \App\Console\Commands\RsvpReminderJuly::class,
        \App\Console\Commands\RsvpConfirmationCommand::class,
        \App\Console\Commands\GenerateUser::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('inspire')
//                 ->hourly();
    }
}
