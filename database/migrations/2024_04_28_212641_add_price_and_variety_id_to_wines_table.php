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
        Schema::table('wines', function (Blueprint $table) {
            // Dodaj novi stupac "price" u tablicu "wines"
            $table->decimal('price', 10, 2)->nullable();

            // Dodaj novi stupac "variety_id" u tablicu "wines"
            $table->unsignedBigInteger('vineyard_id')->nullable();

            // Dodaj strani ključ "variety_id" koji se povezuje s primarnim ključem "id" iz tablice "varieties"
            $table->foreign('vineyard_id')->references('id')->on('vineyards');
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
            // Ukoliko je potrebno, obrisi strani ključ prije nego obrišeš stupce
            $table->dropForeign(['vineyard_id']);

            // Obriši dodane stupce
            $table->dropColumn('price');
            $table->dropColumn('vineyard_id');
        });
    }
};
