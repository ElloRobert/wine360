<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
    {
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('reminders', function (Blueprint $table) {
            $table->foreignId('reminder_priority_id')->nullable()->constrained('priorities');
        });
    }

    public function down()
    {

        Schema::table('reminders', function (Blueprint $table) {
            $table->dropForeign(['reminder_priority_id']);
        });

        Schema::dropIfExists('priorities');
    }
};
