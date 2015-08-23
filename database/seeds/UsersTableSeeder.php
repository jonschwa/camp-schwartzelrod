<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\User::class, 10)->create()
            ->each(function($u) {
                $numGuests = rand(0,4);
                for($i=0; $i<=$numGuests; $i++) {
                    $u->guests()->save(factory(App\Guest::class)->make());
                    $i++;
                }
            });
    }
}

