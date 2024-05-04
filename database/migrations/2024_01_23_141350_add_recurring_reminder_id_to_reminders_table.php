<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->foreignId('recurring_reminder_id')->default(0)->nullable()->constrained('recurring_reminders');
        });
    }

    public function down()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->dropForeign(['recurring_reminder_id']);
            $table->dropColumn('recurring_reminder_id');
        });
    }
};
