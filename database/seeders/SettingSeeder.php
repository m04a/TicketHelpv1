<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'oauth_google' => 1,
            'oauth_github' => 1,
            'oauth_discord' => 1,
            'oauth_instagram' => 1,
            'oauth_facebook' => 1,
            'oauth_vk' => 1,
            'oauth_reddit' => 1,
            'oauth_gitlab' => 1,
        ]);
    }
}
