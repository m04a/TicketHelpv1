<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => 'Departament Informàtica'
        ]);

        DB::table('departments')->insert([
            'name' => 'Consergeria'
        ]);

        DB::table('departments')->insert([
            'name' => 'Secretaria'
        ]);

        DB::table('departments')->insert([
            'name' => 'Direcció'
        ]);

        DB::table('departments')->insert([
            'name' => 'Altres'
        ]);
    }
    
}
