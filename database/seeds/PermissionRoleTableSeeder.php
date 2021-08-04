<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permission_role')->delete();
        
        \DB::table('permission_role')->insert(array (
            0 => 
            array (
                'permission_id' => 1,
                'role_id' => 1,
            ),
            1 => 
            array (
                'permission_id' => 1,
                'role_id' => 3,
            ),
            2 => 
            array (
                'permission_id' => 2,
                'role_id' => 1,
            ),
            3 => 
            array (
                'permission_id' => 3,
                'role_id' => 1,
            ),
            4 => 
            array (
                'permission_id' => 4,
                'role_id' => 1,
            ),
            5 => 
            array (
                'permission_id' => 5,
                'role_id' => 1,
            ),
            6 => 
            array (
                'permission_id' => 6,
                'role_id' => 1,
            ),
            7 => 
            array (
                'permission_id' => 6,
                'role_id' => 3,
            ),
            8 => 
            array (
                'permission_id' => 7,
                'role_id' => 1,
            ),
            9 => 
            array (
                'permission_id' => 7,
                'role_id' => 3,
            ),
            10 => 
            array (
                'permission_id' => 8,
                'role_id' => 1,
            ),
            11 => 
            array (
                'permission_id' => 9,
                'role_id' => 1,
            ),
            12 => 
            array (
                'permission_id' => 10,
                'role_id' => 1,
            ),
            13 => 
            array (
                'permission_id' => 11,
                'role_id' => 1,
            ),
            14 => 
            array (
                'permission_id' => 11,
                'role_id' => 3,
            ),
            15 => 
            array (
                'permission_id' => 12,
                'role_id' => 1,
            ),
            16 => 
            array (
                'permission_id' => 12,
                'role_id' => 3,
            ),
            17 => 
            array (
                'permission_id' => 13,
                'role_id' => 1,
            ),
            18 => 
            array (
                'permission_id' => 14,
                'role_id' => 1,
            ),
            19 => 
            array (
                'permission_id' => 15,
                'role_id' => 1,
            ),
            20 => 
            array (
                'permission_id' => 16,
                'role_id' => 1,
            ),
            21 => 
            array (
                'permission_id' => 16,
                'role_id' => 3,
            ),
            22 => 
            array (
                'permission_id' => 17,
                'role_id' => 1,
            ),
            23 => 
            array (
                'permission_id' => 17,
                'role_id' => 3,
            ),
            24 => 
            array (
                'permission_id' => 18,
                'role_id' => 1,
            ),
            25 => 
            array (
                'permission_id' => 19,
                'role_id' => 1,
            ),
            26 => 
            array (
                'permission_id' => 20,
                'role_id' => 1,
            ),
            27 => 
            array (
                'permission_id' => 21,
                'role_id' => 1,
            ),
            28 => 
            array (
                'permission_id' => 21,
                'role_id' => 3,
            ),
            29 => 
            array (
                'permission_id' => 22,
                'role_id' => 1,
            ),
            30 => 
            array (
                'permission_id' => 22,
                'role_id' => 3,
            ),
            31 => 
            array (
                'permission_id' => 23,
                'role_id' => 1,
            ),
            32 => 
            array (
                'permission_id' => 24,
                'role_id' => 1,
            ),
            33 => 
            array (
                'permission_id' => 25,
                'role_id' => 1,
            ),
            34 => 
            array (
                'permission_id' => 26,
                'role_id' => 1,
            ),
            35 => 
            array (
                'permission_id' => 26,
                'role_id' => 3,
            ),
            36 => 
            array (
                'permission_id' => 27,
                'role_id' => 1,
            ),
            37 => 
            array (
                'permission_id' => 27,
                'role_id' => 3,
            ),
            38 => 
            array (
                'permission_id' => 28,
                'role_id' => 1,
            ),
            39 => 
            array (
                'permission_id' => 29,
                'role_id' => 1,
            ),
            40 => 
            array (
                'permission_id' => 30,
                'role_id' => 1,
            ),
            41 => 
            array (
                'permission_id' => 31,
                'role_id' => 1,
            ),
            42 => 
            array (
                'permission_id' => 31,
                'role_id' => 3,
            ),
            43 => 
            array (
                'permission_id' => 32,
                'role_id' => 1,
            ),
            44 => 
            array (
                'permission_id' => 32,
                'role_id' => 3,
            ),
            45 => 
            array (
                'permission_id' => 33,
                'role_id' => 1,
            ),
            46 => 
            array (
                'permission_id' => 34,
                'role_id' => 1,
            ),
            47 => 
            array (
                'permission_id' => 35,
                'role_id' => 1,
            ),
            48 => 
            array (
                'permission_id' => 36,
                'role_id' => 1,
            ),
            49 => 
            array (
                'permission_id' => 36,
                'role_id' => 3,
            ),
            50 => 
            array (
                'permission_id' => 37,
                'role_id' => 1,
            ),
            51 => 
            array (
                'permission_id' => 37,
                'role_id' => 3,
            ),
            52 => 
            array (
                'permission_id' => 38,
                'role_id' => 1,
            ),
            53 => 
            array (
                'permission_id' => 39,
                'role_id' => 1,
            ),
            54 => 
            array (
                'permission_id' => 40,
                'role_id' => 1,
            ),
            55 => 
            array (
                'permission_id' => 87,
                'role_id' => 1,
            ),
            56 => 
            array (
                'permission_id' => 87,
                'role_id' => 3,
            ),
            57 => 
            array (
                'permission_id' => 88,
                'role_id' => 1,
            ),
            58 => 
            array (
                'permission_id' => 88,
                'role_id' => 3,
            ),
            59 => 
            array (
                'permission_id' => 89,
                'role_id' => 1,
            ),
            60 => 
            array (
                'permission_id' => 90,
                'role_id' => 1,
            ),
            61 => 
            array (
                'permission_id' => 91,
                'role_id' => 1,
            ),
            62 => 
            array (
                'permission_id' => 97,
                'role_id' => 1,
            ),
            63 => 
            array (
                'permission_id' => 97,
                'role_id' => 3,
            ),
            64 => 
            array (
                'permission_id' => 98,
                'role_id' => 1,
            ),
            65 => 
            array (
                'permission_id' => 98,
                'role_id' => 3,
            ),
            66 => 
            array (
                'permission_id' => 99,
                'role_id' => 1,
            ),
            67 => 
            array (
                'permission_id' => 100,
                'role_id' => 1,
            ),
            68 => 
            array (
                'permission_id' => 101,
                'role_id' => 1,
            ),
            69 => 
            array (
                'permission_id' => 102,
                'role_id' => 1,
            ),
            70 => 
            array (
                'permission_id' => 102,
                'role_id' => 3,
            ),
            71 => 
            array (
                'permission_id' => 103,
                'role_id' => 1,
            ),
            72 => 
            array (
                'permission_id' => 103,
                'role_id' => 3,
            ),
            73 => 
            array (
                'permission_id' => 104,
                'role_id' => 1,
            ),
            74 => 
            array (
                'permission_id' => 105,
                'role_id' => 1,
            ),
            75 => 
            array (
                'permission_id' => 106,
                'role_id' => 1,
            ),
            76 => 
            array (
                'permission_id' => 107,
                'role_id' => 1,
            ),
            77 => 
            array (
                'permission_id' => 107,
                'role_id' => 3,
            ),
            78 => 
            array (
                'permission_id' => 108,
                'role_id' => 1,
            ),
            79 => 
            array (
                'permission_id' => 108,
                'role_id' => 3,
            ),
            80 => 
            array (
                'permission_id' => 109,
                'role_id' => 1,
            ),
            81 => 
            array (
                'permission_id' => 110,
                'role_id' => 1,
            ),
            82 => 
            array (
                'permission_id' => 111,
                'role_id' => 1,
            ),
            83 => 
            array (
                'permission_id' => 112,
                'role_id' => 1,
            ),
            84 => 
            array (
                'permission_id' => 112,
                'role_id' => 3,
            ),
            85 => 
            array (
                'permission_id' => 113,
                'role_id' => 1,
            ),
            86 => 
            array (
                'permission_id' => 113,
                'role_id' => 3,
            ),
            87 => 
            array (
                'permission_id' => 114,
                'role_id' => 1,
            ),
            88 => 
            array (
                'permission_id' => 115,
                'role_id' => 1,
            ),
            89 => 
            array (
                'permission_id' => 116,
                'role_id' => 1,
            ),
            90 => 
            array (
                'permission_id' => 117,
                'role_id' => 1,
            ),
            91 => 
            array (
                'permission_id' => 117,
                'role_id' => 3,
            ),
            92 => 
            array (
                'permission_id' => 118,
                'role_id' => 1,
            ),
            93 => 
            array (
                'permission_id' => 118,
                'role_id' => 3,
            ),
            94 => 
            array (
                'permission_id' => 119,
                'role_id' => 1,
            ),
            95 => 
            array (
                'permission_id' => 120,
                'role_id' => 1,
            ),
            96 => 
            array (
                'permission_id' => 121,
                'role_id' => 1,
            ),
            97 => 
            array (
                'permission_id' => 122,
                'role_id' => 1,
            ),
            98 => 
            array (
                'permission_id' => 122,
                'role_id' => 3,
            ),
            99 => 
            array (
                'permission_id' => 123,
                'role_id' => 1,
            ),
            100 => 
            array (
                'permission_id' => 123,
                'role_id' => 3,
            ),
            101 => 
            array (
                'permission_id' => 124,
                'role_id' => 1,
            ),
            102 => 
            array (
                'permission_id' => 125,
                'role_id' => 1,
            ),
            103 => 
            array (
                'permission_id' => 126,
                'role_id' => 1,
            ),
            104 => 
            array (
                'permission_id' => 127,
                'role_id' => 1,
            ),
            105 => 
            array (
                'permission_id' => 127,
                'role_id' => 3,
            ),
            106 => 
            array (
                'permission_id' => 128,
                'role_id' => 1,
            ),
            107 => 
            array (
                'permission_id' => 128,
                'role_id' => 3,
            ),
            108 => 
            array (
                'permission_id' => 129,
                'role_id' => 1,
            ),
            109 => 
            array (
                'permission_id' => 130,
                'role_id' => 1,
            ),
            110 => 
            array (
                'permission_id' => 131,
                'role_id' => 1,
            ),
            111 => 
            array (
                'permission_id' => 132,
                'role_id' => 1,
            ),
            112 => 
            array (
                'permission_id' => 132,
                'role_id' => 3,
            ),
            113 => 
            array (
                'permission_id' => 133,
                'role_id' => 1,
            ),
            114 => 
            array (
                'permission_id' => 133,
                'role_id' => 3,
            ),
            115 => 
            array (
                'permission_id' => 134,
                'role_id' => 1,
            ),
            116 => 
            array (
                'permission_id' => 135,
                'role_id' => 1,
            ),
            117 => 
            array (
                'permission_id' => 136,
                'role_id' => 1,
            ),
        ));
        
        
    }
}