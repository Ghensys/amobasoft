<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('picture');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->timestamp('last_online');
            $table->string('verification_code');
            $table->string('new_email');
            $table->integer('status');
            $table->integer('first');
            $table->string('last_accept_date');
            $table->timestamp('created');
            $table->timestamp('modified');
            $table->string('company_contact');
            $table->double('credits', 20, 2);
            $table->integer('first_trip');
            $table->integer('incomplete_profile');
            $table->integer('phone_verify');
            $table->string('token_auto_login');
            $table->boolean('user_vertical');
            $table->integer('language_id');
            $table->integer('no_registered');
            $table->timestamp('deleted_at')->nullable();
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
