<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $user = DB::table('users')->insert(array(
            'name' => 'Admin',
            'Department'=>'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ));

    }
}