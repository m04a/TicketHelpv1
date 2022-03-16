<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 0,
            'department_id' => 1,
            'user_id' => 1,
            'manager_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 0,
            'department_id' => 1,
            'user_id' => 1,
            'manager_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 1,
            'department_id' => 1,
            'user_id' => 1,
            'manager_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 1,
            'department_id' => 1,
            'user_id' => 7,
            'manager_id' => 1,
        ]);
        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 1,
            'department_id' => 1,
            'user_id' => 7,
            'manager_id' => 1,
        ]);

        DB::table('questions')->insert([
            'title' => 'Problemes amb el projector',
            'description' => 'TEST',
            'status' => 1,
            'department_id' => 1,
            'user_id' => 7,
            'manager_id' => 1,
        ]);
    }
}
