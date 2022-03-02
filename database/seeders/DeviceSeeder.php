<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class Device extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'label' => 'i-01-02',
            'type_id' => 2,
            'zone_id' => 1,
        ]);

        DB::table('devices')->insert([
            'label' => 'm-02-03',
            'type_id' => 3,
            'zone_id' => 2,
        ]);
        
        DB::table('devices')->insert([
            'label' => 'px-03-04',
            'type_id' => 4,
            'zone_id' => 3,
        ]);

        DB::table('devices')->insert([
            'label' => 's-04-02',
            'type_id' => 1,
            'zone_id' => 4,
        ]);
    }
}
