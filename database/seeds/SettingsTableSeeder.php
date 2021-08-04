<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'site.title',
                'display_name' => 'Site Title',
                'value' => 'eStore',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Site',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'site.description',
                'display_name' => 'Site Description',
                'value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Site',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'site.logo',
                'display_name' => 'Site Logo',
                'value' => NULL,
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Site',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'site.google_analytics_tracking_id',
                'display_name' => 'Google Analytics Tracking ID',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 4,
                'group' => 'Site',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'admin.bg_image',
                'display_name' => 'Admin Background Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 5,
                'group' => 'Admin',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'admin.title',
                'display_name' => 'Admin Title',
                'value' => 'eStore',
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'admin.description',
                'display_name' => 'Admin Description',
                'value' => 'eCommerce CMS Script',
                'details' => '',
                'type' => 'text',
                'order' => 2,
                'group' => 'Admin',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'admin.loader',
                'display_name' => 'Admin Loader',
                'value' => NULL,
                'details' => '',
                'type' => 'image',
                'order' => 3,
                'group' => 'Admin',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'admin.icon_image',
                'display_name' => 'Admin Icon Image',
                'value' => '',
                'details' => '',
                'type' => 'image',
                'order' => 4,
                'group' => 'Admin',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'admin.google_analytics_client_id',
            'display_name' => 'Google Analytics Client ID (used for admin dashboard)',
                'value' => NULL,
                'details' => '',
                'type' => 'text',
                'order' => 1,
                'group' => 'Admin',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'social.facebook',
                'display_name' => 'Facebook',
                'value' => 'facebook.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 6,
                'group' => 'Social',
            ),
            11 => 
            array (
                'id' => 13,
                'key' => 'social.youtube',
                'display_name' => 'Youtube',
                'value' => 'youtube.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 8,
                'group' => 'Social',
            ),
            12 => 
            array (
                'id' => 21,
                'key' => 'home.about',
                'display_name' => 'about',
                'value' => '<p><span style="color: #6c757d; font-family: \'Open Sans\', Arial, sans-serif; font-size: 15px;">Deserunt cupiditate error repudiandae doloribus est sit id ad repellendus voluptates molestiae ratione eaque, iure, odit culpa delectus harum asperiores ab a aut, molestias possimus! Tempore commodi iste soluta voluptatibus.&nbsp;</span><span style="color: #6c757d; font-family: \'Open Sans\', Arial, sans-serif; font-size: 15px;">Deserunt cupiditate error repudiandae doloribus est sit id ad repellendus voluptates molestiae ratione eaque.</span></p>',
                'details' => NULL,
                'type' => 'rich_text_box',
                'order' => 16,
                'group' => 'Home',
            ),
            13 => 
            array (
                'id' => 28,
                'key' => 'home.hero_title',
                'display_name' => 'Hero Title',
                'value' => 'Finding Your Perfect Shoes',
                'details' => NULL,
                'type' => 'text',
                'order' => 24,
                'group' => 'Home',
            ),
            14 => 
            array (
                'id' => 29,
                'key' => 'home.hero_subtitle',
                'display_name' => 'Hero Small Title',
                'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer accumsan tincidunt fringilla.',
                'details' => NULL,
                'type' => 'text',
                'order' => 25,
                'group' => 'Home',
            ),
            15 => 
            array (
                'id' => 30,
                'key' => 'home.about_image',
                'display_name' => 'About Image',
                'value' => NULL,
                'details' => NULL,
                'type' => 'image',
                'order' => 17,
                'group' => 'Home',
            ),
            16 => 
            array (
                'id' => 31,
                'key' => 'contact.email',
                'display_name' => 'Email',
                'value' => 'hello@company.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 26,
                'group' => 'Contact',
            ),
            17 => 
            array (
                'id' => 32,
                'key' => 'contact.phone',
                'display_name' => 'Phone',
                'value' => '+338-444-66',
                'details' => NULL,
                'type' => 'text',
                'order' => 27,
                'group' => 'Contact',
            ),
            18 => 
            array (
                'id' => 33,
                'key' => 'contact.location',
                'display_name' => 'Location',
                'value' => '28/C, New Jersey, USA',
                'details' => NULL,
                'type' => 'text',
                'order' => 28,
                'group' => 'Contact',
            ),
            19 => 
            array (
                'id' => 34,
                'key' => 'home.banner',
                'display_name' => 'banner',
                'value' => NULL,
                'details' => NULL,
                'type' => 'image',
                'order' => 29,
                'group' => 'Home',
            ),
            20 => 
            array (
                'id' => 35,
                'key' => 'social.twitter',
                'display_name' => 'Twitter',
                'value' => NULL,
                'details' => NULL,
                'type' => 'text',
                'order' => 30,
                'group' => 'Social',
            ),
            21 => 
            array (
                'id' => 36,
                'key' => 'social.linkedin',
                'display_name' => 'LinkedIn',
                'value' => 'linkedin.com',
                'details' => NULL,
                'type' => 'text',
                'order' => 31,
                'group' => 'Social',
            ),
            22 => 
            array (
                'id' => 37,
                'key' => 'shop.vat',
            'display_name' => 'VAT (%)',
                'value' => '15.00',
                'details' => NULL,
                'type' => 'text',
                'order' => 32,
                'group' => 'Shop',
            ),
            23 => 
            array (
                'id' => 38,
                'key' => 'shop.shipping',
                'display_name' => 'Shipping',
                'value' => '25.00',
                'details' => NULL,
                'type' => 'text',
                'order' => 33,
                'group' => 'Shop',
            ),
        ));
        
        
    }
}