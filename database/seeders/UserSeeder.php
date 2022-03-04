<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'Oriol',
            'email' => 'Oriol@Oriol',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Alex',
            'email' => 'Alex@Alex',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Moha',
            'email' => 'Moha@Moha',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Juanka',
            'email' => 'Juanka@Juanka',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Kirill',
            'email' => 'Kirill@Kirill',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Jorge',
            'email' => 'Jorge@Jorge',
            'role_id' => 3,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Iker',
            'email' => 'Iker@Iker',
            'role_id' => 3,
            'password' => '1234567890',
        ]);
        
        DB::table('users')->insert([
            'username' => 'User',
            'email' => 'User@User',
            'role_id' => 1,
            'password' => '1234567890',
        ]);

        DB::table('users')->insert([
            'username' => 'Editor',
            'email' => 'Editor@Editor',
            'role_id' => 2,
            'password' => '1234567890',
        ]);
    }
}
