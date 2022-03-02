<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Zones')->insert([
            'label' => 'Aula1',
            'description' => "aula de 1er d'Eso"]);

        DB::table('Zones')->insert([
            'label' => 'Aula2',
            'description' => "aula de 2on d'Eso"]);

        DB::table('Zones')->insert([
            'label' => 'Aula3',
            'description' => "aula de 3er d'Eso"]);

        DB::table('Zones')->insert([
            'label' => 'Aula4',
            'description' => "aula de 4rt d'Eso"]);

    }
}
