<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $user = DB::table('users')->insert(array(
            'name' => 'Operational Admin',
            'Department'=>'OPERATIONAL',
            'role' => 'admin',
            'email' => 'operational@admin.com',
            'password' => Hash::make('operational'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'Dean',
            'Department'=>'DEAN',
            'role' => 'admin',
            'email' => 'dean@admin.com',
            'password' => Hash::make('admin'),
        ));


        $user = DB::table('users')->insert(array(
            'name' => 'SBA.Dean',
            'Department'=>'SBADEAN',
            'role' => 'admin',
            'email' => 'sbadean@admin.com',
            'password' => Hash::make('sbaadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'CNAMS.Dean',
            'Department'=>'CNAMSDEAN',
            'role' => 'admin',
            'email' => 'cnamsdean@admin.com',
            'password' => Hash::make('cnamsadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'SAS.Dean',
            'Department'=>'SASDEAN',
            'role' => 'admin',
            'email' => 'sasdean@admin.com',
            'password' => Hash::make('sasadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'SED.Dean',
            'Department'=>'SEDDEAN',
            'role' => 'admin',
            'email' => 'seddean@admin.com',
            'password' => Hash::make('sedadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'SEA.Dean',
            'Department'=>'SEADEAN',
            'role' => 'admin',
            'email' => 'seadean@admin.com',
            'password' => Hash::make('seaadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'CHTM.Dean',
            'Department'=>'CHTMDEAN',
            'role' => 'admin',
            'email' => 'chtmdean@admin.com',
            'password' => Hash::make('chtmadmin'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'CCJEF.Dean',
            'Department'=>'CCJEFDEAN',
            'role' => 'admin',
            'email' => 'ccjefdean@admin.com',
            'password' => Hash::make('ccjefadmin'),
        ));


        $user = DB::table('users')->insert(array(
            'name' => 'CSDO',
            'Department'=>'CSDO',
            'role' => 'admin',
            'email' => 'csdo@admin.com',
            'password' => Hash::make('csdo'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'OSA',
            'Department'=>'OSA',
            'role' => 'admin',
            'email' => 'osa@admin.com',
            'password' => Hash::make('osaa'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'E.MAN',
            'Department'=>'EMAN',
            'role' => 'admin',
            'email' => 'eman@admin.com',
            'password' => Hash::make('csdo'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'VPAA',
            'Department'=>'VPAA',
            'role' => 'admin',
            'email' => 'vpaa@admin.com',
            'password' => Hash::make('vpaa'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'HS.MAPEH',
            'Department'=>'HS.MAPEH',
            'role' => 'admin',
            'email' => 'hsmapeh@admin.com',
            'password' => Hash::make('hsmapeh'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'PE.coordinator',
            'Department'=>'PE.COORDINATOR',
            'role' => 'admin',
            'email' => 'pecoordniator@admin.com',
            'password' => Hash::make('pecoordniator'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'US.coordinator',
            'Department'=>'US.COORDINATOR',
            'role' => 'admin',
            'email' => 'uscoordinator@admin.com',
            'password' => Hash::make('uscoordinator'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'ISSI',
            'Department'=>'ISSI',
            'role' => 'admin',
            'email' => 'issi@admin.com',
            'password' => Hash::make('issi'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'MRCC',
            'Department'=>'MRCC',
            'role' => 'admin',
            'email' => 'mrcc@admin.com',
            'password' => Hash::make('mrcc'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'Student Conduct Officer',
            'Department'=>'SCO',
            'role' => 'admin',
            'email' => 'sco@admin.com',
            'password' => Hash::make('sco123'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'codegeeks',
            'Department'=>'CICT',
            'role' => 'user',
            'email' => 'codegeeks@gmail.com',
            'password' => Hash::make('codegeeks'),
        ));

        $user = DB::table('users')->insert(array(
            'name' => 'Loop',
            'Department'=>'CICT',
            'role' => 'user',
            'email' => 'loop@gmail.com',
            'password' => Hash::make('loop'),
        ));

    }
}