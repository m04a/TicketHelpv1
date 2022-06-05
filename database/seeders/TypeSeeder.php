<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        DB::table('types')->insert([
            'id' => 1,
            'label' => 'Switch',
            'description' => 'switchs CISCO del institut',
        ]);

        DB::table('types')->insert([
            'id' => 2,
            'label' => 'Impresora',
            'description' => 'impresores EPSON del institut',
        ]);

        DB::table('types')->insert([
            'id' => 3,
            'label' => 'Monitor',
            'description' => 'monitors LG pro max institut',
        ]);

        DB::table('types')->insert([
            'id' => 4,
            'label' => 'Punt de xarxa',
            'description' => 'Punts de xarxes de les diferents aules',
        ]);
    }
}
