<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('is_admin')->default(0);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email', 100)->unique()->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('contact_preference', 12)->nullable();
            $table->string('password', 60);
            $table->integer('max_guests')->default(2);
            $table->tinyInteger('active')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
