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
            'username' => 'SuperAdmin',
            'email' => 'superadmin@cendrassos.net',
            'role_id' => 4,
            'department_id' => null,
            'zone_id' => null,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@cendrassos.net',
            'role_id' => 3,
            'department_id' => 2,
            'zone_id' => null,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Oriol',
            'email' => 'obech@cendrassos.net',
            'role_id' => 1,
            'department_id' => null,
            'zone_id' => 2,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Moha',
            'email' => 'mbourarach@cendrassos.net',
            'role_id' => 1,
            'department_id' => null,
            'zone_id' => 4,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Alex',
            'email' => 'aaguilera@cendrassos.net',
            'role_id' => 1,
            'department_id' => null,
            'zone_id' => 2,
            'password' => Hash::make('1234567890'),
        ]);
        
        DB::table('users')->insert([
            'username' => 'Usuari',
            'email' => 'usuari@cendrassos.net',
            'role_id' => 1,
            'department_id' => null,
            'zone_id' => 2,
            'password' => Hash::make('1234567890'),
        ]);

        DB::table('users')->insert([
            'username' => 'Moderador',
            'email' => 'moderador@cendrassos.net',
            'role_id' => 2,
            'department_id' => 2,
            'zone_id' => null,
            'password' => Hash::make('1234567890'),
        ]);
    }
}
