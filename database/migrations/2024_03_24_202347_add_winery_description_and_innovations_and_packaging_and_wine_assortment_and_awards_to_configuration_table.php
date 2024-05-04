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
        Schema::table('configuration', function (Blueprint $table) {
            $table->text('winery_description')->nullable();
            $table->text('innovations')->nullable();
            $table->text('packaging')->nullable();
            $table->text('wine_assortment')->nullable();
            $table->text('awards')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configuration', function (Blueprint $table) {
            $table->dropColumn('winery_description');
            $table->dropColumn('innovations');
            $table->dropColumn('packaging');
            $table->dropColumn('wine_assortment');
            $table->dropColumn('awards');
        });
    }
};
