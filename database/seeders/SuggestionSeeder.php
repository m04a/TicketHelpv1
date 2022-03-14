<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuggestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 2,
            'user_id' => 3,
        ]);
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 2,
            'user_id' => 4,
        ]);
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 5,
            'user_id' => 3,
        ]);
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 2,
            'user_id' => 6,
        ]);
        DB::table('suggestions')->insert([
            'title' => 'Millora el aula',
            'description' => 'En el aula fa molta fred mamahuevo',
            'department_id' => 4,
            'user_id' => 8,
        ]);
    }
}
