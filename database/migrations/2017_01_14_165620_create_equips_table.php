<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equips', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::drop('equips');
    }
}
