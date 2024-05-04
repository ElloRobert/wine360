<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('varieties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ime sorte
            $table->foreignId('color_id')->constrained(); // Povezivanje sa tablicom boja
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('varieties');
    }
};
