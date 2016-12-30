<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalmessages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notif')->default(0);
            $table->string('sender');
            $table->string('send_to');
            $table->string('message',1000);
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
        Schema::drop('personalmessages');
    }
}
