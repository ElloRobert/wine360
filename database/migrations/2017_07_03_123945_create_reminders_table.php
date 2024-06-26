<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('category');
            $table->string('details')->nullable()->default(null);
            $table->dateTime('end_date_reminder')->nullable()->default(null);
            $table->boolean('status')->default(0);  // 0 or 1
            $table->date('completed_date')->nullable()->default(null);
            $table->integer('creator_id')->nullable()->unsigned()->default(null);
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('cron_mail')->nullable()->default(0);
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
        Schema::dropIfExists('reminders');
    }
}
