<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('currency_id');
            $table->integer('next_user_plan_id')->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
            $table->timestamp('renewal_timestamp')->nullable();
            $table->double('renewal_price', 100,10);
            $table->integer('requires_invoice');
            $table->integer('status');
            $table->timestamp('created');
            $table->timestamp('modified');
            $table->integer('financiation');
            $table->integer('status_financiation');
            $table->string('language');
            $table->string('nif');
            $table->string('business_name');
            $table->integer('pending_payment');
            $table->timestamp('date_max_payment')->nullable();
            $table->timestamp('proxim_start_timestamp')->nullable();
            $table->timestamp('proxim_end_timestamp')->nullable();
            $table->timestamp('proxim_renewal_timestamp')->nullable();
            $table->double('proxim_renewal_price', 100, 10)->nullable();
            $table->double('credits_return', 100, 10);
            $table->integer('company_id');
            $table->integer('cancel_employee');
            $table->integer('force_renovation');
            $table->timestamp('date_canceled')->nullable();
            $table->double('amount_confirm_canceled'. 100, 10);
            $table->double('credit_confirm_canceled', 100, 10);
            $table->integer('cost_center_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_plans');
    }
}
