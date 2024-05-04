<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->string('userHash')->nullable()->default(null); //razmisli da li treba?
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
            $table->string('company')->nullable()->default(null);
            $table->string('oib')->nullable()->default(null);
            $table->string('company_oib')->nullable()->default(null);
            $table->boolean('is_active')->default(1);

            //Ako je user registriran od strane pravne osobe
            $table->integer('legal_entity_user_id')->nullable()->unsigned()->default(null);
            $table->foreign('legal_entity_user_id')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('legal_entity_employee_permission')->default(0);

            $table->string('appLanguage')->default('hr');
            $table->integer('activation')->nullable()->default(1);
            $table->dateTime('activation_date')->nullable()->default(Carbon\Carbon::now()->format('Y-m-d H:i:s'));

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
