<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuration', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->nullable()->unsigned()->default(null);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('applicationName')->nullable()->default(null);
            $table->string('applicationImage')->nullable()->default(null);
            $table->string('applicationAddress')->nullable()->default(null);
            $table->string('applicationAddress2')->nullable()->default(null);
            $table->string('applicationCity')->nullable()->default(null);
            $table->string('applicationState')->nullable()->default(null);
            $table->string('applicationZip')->nullable()->default(null);
            $table->string('applicationCountry')->nullable()->default(null);
            $table->string('applicationPhone')->nullable()->default(null);
            $table->string('applicationIndustry')->nullable()->default(null);
            $table->string('emailForReports')->nullable()->default(null);
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
        Schema::dropIfExists('configuration');
    }
}
