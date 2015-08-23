<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityGuestPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_guest', function (Blueprint $table) {
            $table->integer('activity_id')->unsigned()->index();
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->integer('guest_id')->unsigned()->index();
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity_guest');
    }
}
