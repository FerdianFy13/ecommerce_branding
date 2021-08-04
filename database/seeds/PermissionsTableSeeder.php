<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'browse_admin',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:42',
                'updated_at' => '2020-04-28 09:48:42',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'browse_bread',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:42',
                'updated_at' => '2020-04-28 09:48:42',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'browse_database',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'browse_media',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'browse_compass',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'browse_menus',
                'table_name' => 'menus',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'read_menus',
                'table_name' => 'menus',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'edit_menus',
                'table_name' => 'menus',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'add_menus',
                'table_name' => 'menus',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'delete_menus',
                'table_name' => 'menus',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'browse_roles',
                'table_name' => 'roles',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'read_roles',
                'table_name' => 'roles',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'edit_roles',
                'table_name' => 'roles',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'add_roles',
                'table_name' => 'roles',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'delete_roles',
                'table_name' => 'roles',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'browse_users',
                'table_name' => 'users',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'read_users',
                'table_name' => 'users',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'edit_users',
                'table_name' => 'users',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'add_users',
                'table_name' => 'users',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'delete_users',
                'table_name' => 'users',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'browse_settings',
                'table_name' => 'settings',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'read_settings',
                'table_name' => 'settings',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'edit_settings',
                'table_name' => 'settings',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'add_settings',
                'table_name' => 'settings',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'delete_settings',
                'table_name' => 'settings',
                'created_at' => '2020-04-28 09:48:43',
                'updated_at' => '2020-04-28 09:48:43',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'browse_categories',
                'table_name' => 'categories',
                'created_at' => '2020-04-28 09:48:48',
                'updated_at' => '2020-04-28 09:48:48',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'read_categories',
                'table_name' => 'categories',
                'created_at' => '2020-04-28 09:48:48',
                'updated_at' => '2020-04-28 09:48:48',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'edit_categories',
                'table_name' => 'categories',
                'created_at' => '2020-04-28 09:48:48',
                'updated_at' => '2020-04-28 09:48:48',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'add_categories',
                'table_name' => 'categories',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'delete_categories',
                'table_name' => 'categories',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'browse_posts',
                'table_name' => 'posts',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'read_posts',
                'table_name' => 'posts',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'edit_posts',
                'table_name' => 'posts',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'add_posts',
                'table_name' => 'posts',
                'created_at' => '2020-04-28 09:48:49',
                'updated_at' => '2020-04-28 09:48:49',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'delete_posts',
                'table_name' => 'posts',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'browse_pages',
                'table_name' => 'pages',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'read_pages',
                'table_name' => 'pages',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'edit_pages',
                'table_name' => 'pages',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'add_pages',
                'table_name' => 'pages',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'delete_pages',
                'table_name' => 'pages',
                'created_at' => '2020-04-28 09:48:50',
                'updated_at' => '2020-04-28 09:48:50',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'browse_hooks',
                'table_name' => NULL,
                'created_at' => '2020-04-28 09:48:52',
                'updated_at' => '2020-04-28 09:48:52',
            ),
            41 => 
            array (
                'id' => 87,
                'key' => 'browse_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2020-06-18 15:28:07',
                'updated_at' => '2020-06-18 15:28:07',
            ),
            42 => 
            array (
                'id' => 88,
                'key' => 'read_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2020-06-18 15:28:07',
                'updated_at' => '2020-06-18 15:28:07',
            ),
            43 => 
            array (
                'id' => 89,
                'key' => 'edit_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2020-06-18 15:28:07',
                'updated_at' => '2020-06-18 15:28:07',
            ),
            44 => 
            array (
                'id' => 90,
                'key' => 'add_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2020-06-18 15:28:07',
                'updated_at' => '2020-06-18 15:28:07',
            ),
            45 => 
            array (
                'id' => 91,
                'key' => 'delete_testimonials',
                'table_name' => 'testimonials',
                'created_at' => '2020-06-18 15:28:07',
                'updated_at' => '2020-06-18 15:28:07',
            ),
            46 => 
            array (
                'id' => 97,
                'key' => 'browse_members',
                'table_name' => 'members',
                'created_at' => '2020-06-18 15:40:58',
                'updated_at' => '2020-06-18 15:40:58',
            ),
            47 => 
            array (
                'id' => 98,
                'key' => 'read_members',
                'table_name' => 'members',
                'created_at' => '2020-06-18 15:40:58',
                'updated_at' => '2020-06-18 15:40:58',
            ),
            48 => 
            array (
                'id' => 99,
                'key' => 'edit_members',
                'table_name' => 'members',
                'created_at' => '2020-06-18 15:40:58',
                'updated_at' => '2020-06-18 15:40:58',
            ),
            49 => 
            array (
                'id' => 100,
                'key' => 'add_members',
                'table_name' => 'members',
                'created_at' => '2020-06-18 15:40:58',
                'updated_at' => '2020-06-18 15:40:58',
            ),
            50 => 
            array (
                'id' => 101,
                'key' => 'delete_members',
                'table_name' => 'members',
                'created_at' => '2020-06-18 15:40:58',
                'updated_at' => '2020-06-18 15:40:58',
            ),
            51 => 
            array (
                'id' => 102,
                'key' => 'browse_brands',
                'table_name' => 'brands',
                'created_at' => '2020-06-20 05:07:57',
                'updated_at' => '2020-06-20 05:07:57',
            ),
            52 => 
            array (
                'id' => 103,
                'key' => 'read_brands',
                'table_name' => 'brands',
                'created_at' => '2020-06-20 05:07:57',
                'updated_at' => '2020-06-20 05:07:57',
            ),
            53 => 
            array (
                'id' => 104,
                'key' => 'edit_brands',
                'table_name' => 'brands',
                'created_at' => '2020-06-20 05:07:57',
                'updated_at' => '2020-06-20 05:07:57',
            ),
            54 => 
            array (
                'id' => 105,
                'key' => 'add_brands',
                'table_name' => 'brands',
                'created_at' => '2020-06-20 05:07:57',
                'updated_at' => '2020-06-20 05:07:57',
            ),
            55 => 
            array (
                'id' => 106,
                'key' => 'delete_brands',
                'table_name' => 'brands',
                'created_at' => '2020-06-20 05:07:57',
                'updated_at' => '2020-06-20 05:07:57',
            ),
            56 => 
            array (
                'id' => 107,
                'key' => 'browse_products',
                'table_name' => 'products',
                'created_at' => '2020-06-24 16:19:27',
                'updated_at' => '2020-06-24 16:19:27',
            ),
            57 => 
            array (
                'id' => 108,
                'key' => 'read_products',
                'table_name' => 'products',
                'created_at' => '2020-06-24 16:19:27',
                'updated_at' => '2020-06-24 16:19:27',
            ),
            58 => 
            array (
                'id' => 109,
                'key' => 'edit_products',
                'table_name' => 'products',
                'created_at' => '2020-06-24 16:19:27',
                'updated_at' => '2020-06-24 16:19:27',
            ),
            59 => 
            array (
                'id' => 110,
                'key' => 'add_products',
                'table_name' => 'products',
                'created_at' => '2020-06-24 16:19:27',
                'updated_at' => '2020-06-24 16:19:27',
            ),
            60 => 
            array (
                'id' => 111,
                'key' => 'delete_products',
                'table_name' => 'products',
                'created_at' => '2020-06-24 16:19:27',
                'updated_at' => '2020-06-24 16:19:27',
            ),
            61 => 
            array (
                'id' => 112,
                'key' => 'browse_coupons',
                'table_name' => 'coupons',
                'created_at' => '2020-06-26 08:53:11',
                'updated_at' => '2020-06-26 08:53:11',
            ),
            62 => 
            array (
                'id' => 113,
                'key' => 'read_coupons',
                'table_name' => 'coupons',
                'created_at' => '2020-06-26 08:53:11',
                'updated_at' => '2020-06-26 08:53:11',
            ),
            63 => 
            array (
                'id' => 114,
                'key' => 'edit_coupons',
                'table_name' => 'coupons',
                'created_at' => '2020-06-26 08:53:11',
                'updated_at' => '2020-06-26 08:53:11',
            ),
            64 => 
            array (
                'id' => 115,
                'key' => 'add_coupons',
                'table_name' => 'coupons',
                'created_at' => '2020-06-26 08:53:11',
                'updated_at' => '2020-06-26 08:53:11',
            ),
            65 => 
            array (
                'id' => 116,
                'key' => 'delete_coupons',
                'table_name' => 'coupons',
                'created_at' => '2020-06-26 08:53:11',
                'updated_at' => '2020-06-26 08:53:11',
            ),
            66 => 
            array (
                'id' => 117,
                'key' => 'browse_orders',
                'table_name' => 'orders',
                'created_at' => '2020-06-27 08:37:05',
                'updated_at' => '2020-06-27 08:37:05',
            ),
            67 => 
            array (
                'id' => 118,
                'key' => 'read_orders',
                'table_name' => 'orders',
                'created_at' => '2020-06-27 08:37:05',
                'updated_at' => '2020-06-27 08:37:05',
            ),
            68 => 
            array (
                'id' => 119,
                'key' => 'edit_orders',
                'table_name' => 'orders',
                'created_at' => '2020-06-27 08:37:05',
                'updated_at' => '2020-06-27 08:37:05',
            ),
            69 => 
            array (
                'id' => 120,
                'key' => 'add_orders',
                'table_name' => 'orders',
                'created_at' => '2020-06-27 08:37:05',
                'updated_at' => '2020-06-27 08:37:05',
            ),
            70 => 
            array (
                'id' => 121,
                'key' => 'delete_orders',
                'table_name' => 'orders',
                'created_at' => '2020-06-27 08:37:05',
                'updated_at' => '2020-06-27 08:37:05',
            ),
            71 => 
            array (
                'id' => 122,
                'key' => 'browse_customers',
                'table_name' => 'customers',
                'created_at' => '2020-06-30 05:29:08',
                'updated_at' => '2020-06-30 05:29:08',
            ),
            72 => 
            array (
                'id' => 123,
                'key' => 'read_customers',
                'table_name' => 'customers',
                'created_at' => '2020-06-30 05:29:08',
                'updated_at' => '2020-06-30 05:29:08',
            ),
            73 => 
            array (
                'id' => 124,
                'key' => 'edit_customers',
                'table_name' => 'customers',
                'created_at' => '2020-06-30 05:29:08',
                'updated_at' => '2020-06-30 05:29:08',
            ),
            74 => 
            array (
                'id' => 125,
                'key' => 'add_customers',
                'table_name' => 'customers',
                'created_at' => '2020-06-30 05:29:08',
                'updated_at' => '2020-06-30 05:29:08',
            ),
            75 => 
            array (
                'id' => 126,
                'key' => 'delete_customers',
                'table_name' => 'customers',
                'created_at' => '2020-06-30 05:29:08',
                'updated_at' => '2020-06-30 05:29:08',
            ),
            76 => 
            array (
                'id' => 127,
                'key' => 'browse_reviews',
                'table_name' => 'reviews',
                'created_at' => '2020-07-01 10:43:57',
                'updated_at' => '2020-07-01 10:43:57',
            ),
            77 => 
            array (
                'id' => 128,
                'key' => 'read_reviews',
                'table_name' => 'reviews',
                'created_at' => '2020-07-01 10:43:57',
                'updated_at' => '2020-07-01 10:43:57',
            ),
            78 => 
            array (
                'id' => 129,
                'key' => 'edit_reviews',
                'table_name' => 'reviews',
                'created_at' => '2020-07-01 10:43:57',
                'updated_at' => '2020-07-01 10:43:57',
            ),
            79 => 
            array (
                'id' => 130,
                'key' => 'add_reviews',
                'table_name' => 'reviews',
                'created_at' => '2020-07-01 10:43:57',
                'updated_at' => '2020-07-01 10:43:57',
            ),
            80 => 
            array (
                'id' => 131,
                'key' => 'delete_reviews',
                'table_name' => 'reviews',
                'created_at' => '2020-07-01 10:43:57',
                'updated_at' => '2020-07-01 10:43:57',
            ),
            81 => 
            array (
                'id' => 132,
                'key' => 'browse_currencies',
                'table_name' => 'currencies',
                'created_at' => '2020-07-01 15:55:45',
                'updated_at' => '2020-07-01 15:55:45',
            ),
            82 => 
            array (
                'id' => 133,
                'key' => 'read_currencies',
                'table_name' => 'currencies',
                'created_at' => '2020-07-01 15:55:45',
                'updated_at' => '2020-07-01 15:55:45',
            ),
            83 => 
            array (
                'id' => 134,
                'key' => 'edit_currencies',
                'table_name' => 'currencies',
                'created_at' => '2020-07-01 15:55:45',
                'updated_at' => '2020-07-01 15:55:45',
            ),
            84 => 
            array (
                'id' => 135,
                'key' => 'add_currencies',
                'table_name' => 'currencies',
                'created_at' => '2020-07-01 15:55:45',
                'updated_at' => '2020-07-01 15:55:45',
            ),
            85 => 
            array (
                'id' => 136,
                'key' => 'delete_currencies',
                'table_name' => 'currencies',
                'created_at' => '2020-07-01 15:55:45',
                'updated_at' => '2020-07-01 15:55:45',
            ),
        ));
        
        
    }
}