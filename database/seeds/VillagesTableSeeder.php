<?php

use Illuminate\Database\Seeder;

class VillagesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Village::class, 2)->create()
            ->each(function($v) {
                for($i=1; $i<=6; $i++) {
                    $v->cabins()->save(factory(App\Cabin::class)->make());
                }
            });
    }
}
