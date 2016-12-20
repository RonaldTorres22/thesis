<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subaccounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acc_id')->unsigned();
            $table->foreign('acc_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('Department');
            $table->string('email')->unique();
            $table->string('password');
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
        Schema::drop('subaccounts');
    }
}
