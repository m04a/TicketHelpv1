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
        Schema::create('devices', function (Blueprint $table) {

            $table->id();
            $table->string('label');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(Blueprint $table)
    {
        Schema::dropIfExists('devices');

        $table->dropForeign('lists_type_id_foreign');
        $table->dropColumn('type_id');

        $table->dropForeign('lists_zone_id_foreign');
        $table->dropColumn('zone_id');
    }
};
