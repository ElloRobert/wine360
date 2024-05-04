<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->foreignId('color_id')->nullable()->constrained(); // Boja vina
            $table->foreignId('variety_id')->nullable()->constrained(); // Sorta vina
        });
    }

    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->dropForeign(['color_id']);
            $table->dropForeign(['variety_id']);
            $table->dropColumn(['color_id', 'variety_id']);
        });
    }
};
