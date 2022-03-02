<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('zones')->insert([
            'label' => 'Aula1',
            'description' => "aula de 1er d'Eso"]);

        DB::table('zones')->insert([
            'label' => 'Aula2',
            'description' => "aula de 2on d'Eso"]);

        DB::table('zones')->insert([
            'label' => 'Aula3',
            'description' => "aula de 3er d'Eso"]);

        DB::table('zones')->insert([
            'label' => 'Aula4',
            'description' => "aula de 4rt d'Eso"]);

    }
}
