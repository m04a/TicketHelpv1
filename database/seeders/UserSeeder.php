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
            'email' => 'oriol@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Alex',
            'email' => 'alex@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Moha',
            'email' => 'moha@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Juanka',
            'email' => 'juanka@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Kirill',
            'email' => 'kirill@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Jorge',
            'email' => 'jorge@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Iker',
            'email' => 'iker@cendrassos.net',
            'role_id' => 3,
            'password' => Hash::make('1234567890'),
        ]);
        
        DB::table('users')->insert([
            'username' => 'User',
            'email' => 'user@cendrassos.net',
            'role_id' => 1,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Editor',
            'email' => 'editor@cendrassos.net',
            'role_id' => 2,
            'password' => Hash::make('1234567890'),
        ]);
    }
}
