<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('oauth_google');
            $table->boolean('oauth_github');
            $table->boolean('oauth_discord');
            $table->boolean('oauth_instagram');
            $table->boolean('oauth_facebook');
            $table->boolean('oauth_vk');
            $table->boolean('oauth_reddit');
            $table->boolean('oauth_gitlab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings_page');
    }
};
