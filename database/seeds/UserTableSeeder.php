<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = DB::table('users')->insert(array(
            'name' => 'Dean',
            'Department'=>'DEAN',
            'email' => 'dean@admin.com',
            'password' => Hash::make('admin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'CSDO',
            'Department'=>'CSDO',
            'email' => 'csdo@admin.com',
            'password' => Hash::make('csdo'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'OSA',
            'Department'=>'OSA',
            'email' => 'osa@admin.com',
            'password' => Hash::make('osaa'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'E.MAN',
            'Department'=>'EMAN',
            'email' => 'eman@admin.com',
            'password' => Hash::make('csdo'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'VPAA',
            'Department'=>'VPAA',
            'email' => 'vpaa@gmail.com',
            'password' => Hash::make('vpaa'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'codegeeks',
            'Department'=>'CICT',
            'email' => 'codegeeks@gmail.com',
            'password' => Hash::make('codegeeks'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'Loop',
            'Department'=>'CICT',
            'email' => 'loop@gmail.com',
            'password' => Hash::make('loop'),
        ));

    }
}