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
        $table->string('title', 100);
        $table->string('name');
        $table->string('participants');
        $table->string('venue')->nullable();
        $table->integer('visitors')->nullable();
        $table->integer('vehicles')->nullable();
        $table->integer('no_uniforms')->nullable();
        $table->string('activity');
        $table->string('date');
        $table->timestamp('approvedate');
        $table->integer('notif')->default(0);
        $table->integer('notif2')->default(0);
        $table->string('status')->default('pending');
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
