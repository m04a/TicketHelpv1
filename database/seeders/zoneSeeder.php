<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\models\Zone;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Zone::insert([
            'label' => 'Aula1',
            'description' => "aula de 1er d'Eso"]);

        Zone::insert([
            'label' => 'Aula2',
            'description' => "aula de 2on d'Eso"]);

        Zone::insert([
            'label' => 'Aula3',
            'description' => "aula de 3er d'Eso"]);

        Zone::insert([
            'label' => 'Aula4',
            'description' => "aula de 4rt d'Eso"]);

    }
}
