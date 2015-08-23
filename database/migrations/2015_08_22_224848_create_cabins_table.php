<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCabinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('village_id')->unsigned()->index();
            $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->integer('capacity')->unsigned();
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
        Schema::drop('cabins');
    }
}
