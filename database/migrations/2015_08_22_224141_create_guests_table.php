<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->tinyInteger('is_adult')->default(1);
            $table->tinyInteger('is_staying')->default(0);
            $table->tinyInteger('cabin_adventure_level')->nullable();
            $table->tinyInteger('interested_archery')->default(0);
            $table->tinyInteger('interested_swimming')->default(0);
            $table->tinyInteger('interested_boating')->default(0);
            $table->tinyInteger('interested_arts_and_crafts')->default(0);
            $table->tinyInteger('interested_soccer')->default(0);
            $table->tinyInteger('interested_tennis')->default(0);
            $table->tinyInteger('interested_basketball')->default(0);
            $table->tinyInteger('interested_baseball')->default(0);
            $table->tinyInteger('interested_volleyball')->default(0);
            $table->tinyInteger('interested_football')->default(0);
            $table->tinyInteger('interested_frisbee')->default(0);
            $table->tinyInteger('interested_dodgeball')->default(0);
            $table->tinyInteger('interested_capture_the_flag')->default(0);
            $table->tinyInteger('interested_scavenger_hunt')->default(0);
            $table->tinyInteger('interested_low_ropes')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guests');
    }
}
