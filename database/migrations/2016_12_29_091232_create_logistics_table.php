<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('by');
            $table->string('status')->default('pending');
            $table->integer('CollegeFlag')->nullable();
            $table->integer('Rostrum')->nullable();
            $table->integer('WoodenPanel')->nullable();
            $table->integer('DecorativePlants')->nullable();
            $table->integer('SchoolFlag')->nullable();
            $table->integer('MonoblockChairs')->nullable();
            $table->integer('StandingBoards')->nullable();
            $table->integer('PhilippineFlag')->nullable();
            $table->integer('Platform')->nullable();
            $table->integer('WhitePanel')->nullable();
            $table->integer('WoodenChairs')->nullable();
            $table->integer('SoundsSystem')->nullable();
            $table->integer('Projector')->nullable();
            $table->integer('ExtensionCord')->nullable();
            $table->integer('ProjectorScreen')->nullable();
            $table->integer('Microphone')->nullable();
            $table->integer('DvdPlayer')->nullable();
            $table->integer('WirelessMic')->nullable();
            $table->integer('MicStand')->nullable();  
            $table->integer('others')->nullable();    
            $table->string('othersName')->nullable(); 
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
        Schema::drop('logistics');
    }
}
