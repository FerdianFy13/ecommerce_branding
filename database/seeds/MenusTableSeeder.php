<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2020-04-28 09:48:42',
                'updated_at' => '2020-04-28 09:48:42',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'header_menu',
                'created_at' => '2020-05-01 11:23:13',
                'updated_at' => '2020-05-01 11:23:13',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'footer_menu',
                'created_at' => '2020-05-01 11:23:26',
                'updated_at' => '2020-05-01 11:23:26',
            ),
        ));
        
        
    }
}