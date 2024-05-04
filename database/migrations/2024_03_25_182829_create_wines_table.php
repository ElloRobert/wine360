<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Naziv vina
            $table->date('harvest_date'); // Datum berbe
            $table->string('harvest_method'); // Način berbe
            $table->string('vintage_variety'); // Vinska sorta
            $table->string('nutrition_data'); // Podaci o prehrani
            $table->string('allergen_declaration'); // Deklaracija alergena
            $table->string('country_of_origin'); // Zemlja porijekla
            $table->string('importer_bottler_manufacturer'); // Uvoznik, punionica i proizvođač
            $table->string('geographical_origin_labels'); // Oznake zemljopisnog podrijetla
            $table->string('harvest_year'); // Godina berbe
            $table->float('alcohol_by_volume'); // Volumni postotak alkohola (ABV)
            $table->integer('net_quantity_ml'); // Neto količina u mililitrima
            $table->string('sugar_content'); // Sadržaj šećera
            $table->string('grape_variety_harvest_specific'); // Sorta vinove loze specifična za berbu
            $table->text('product_description'); // Opis proizvoda
            $table->date('expiration_date'); // Datum isteka
            $table->softDeletes(); // Soft delete kolona
            $table->timestamps();
        });

        Schema::table('wines', function (Blueprint $table) {
            $table->unsignedBigInteger('configuration_id')->nullable();
            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->dropForeign(['configuration_id']);
            $table->dropColumn('configuration_id');
        });

        Schema::dropIfExists('wines');
    }
}
