<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2020-04-28 09:48:42',
                'updated_at' => '2020-04-28 09:48:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Normal User',
                'created_at' => '2020-04-28 09:48:42',
                'updated_at' => '2020-04-28 09:48:42',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Admin Admin',
                'display_name' => 'Admin Admin',
                'created_at' => '2020-04-29 08:29:05',
                'updated_at' => '2020-04-29 08:29:05',
            ),
        ));
        
        
    }
}