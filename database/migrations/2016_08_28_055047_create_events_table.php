<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('type_activity');
        $table->string('name', 15);
        $table->string('title', 100);
        $table->string('participants');
        $table->string('venue')->nullable();
        $table->string('activity');
        $table->timestamp('start_time');
        $table->timestamp('end_time')->nullable();
   
        });

        // Schema::create('events', function (Blueprint $table) {
        //     $table->increments('id');

        //     $table->string('evt_name');
        //     $table->string('evt_desc');
        //     $table->date('evt_date');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
