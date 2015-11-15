<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 20)->create()
            ->each(function($u) {
                $numGuests = rand(0,4);
                for($i=0; $i<=$numGuests; $i++) {
                    $guest = $u->guests()->save(factory(App\Guest::class)->make());
                    //$guest->activities()->attach($this->getRandomActivityIds());
                    $i++;
                }
                $invitation = $u->invitation()->save(factory(App\Invitation::class)->make());
                if(rand(0,1) === 1) {
                    $invitation->rsvp()->create([
                        'will_attend' => rand(0,1),
                        'user_id' => $invitation->user_id,
                        'num_guests' => $u->guests()->count()
                    ]);
                }
            });
    }

    private function getRandomActivityIds()
    {
        $activityIds = App\Activity::lists('id')->toArray();
        $randIds = array_rand($activityIds, 3);
        unset($randIds[0]);

        //some more extra randomness...
        if(rand(0,1) == 1) {
            unset($randIds[1]);
        }

        return $randIds;
    }
}

