<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ActivityTableSeeder extends Seeder
{
    public function run()
    {
        $activities = [
            ['name' => 'Swimming'],
            ['name' => 'Boating'],
            ['name' =>'Archery'],
            ['name' =>'Arts & Crafts'],
            ['name' =>'Tennis']
        ];
        App\Activity::insert($activities);
    }
}
