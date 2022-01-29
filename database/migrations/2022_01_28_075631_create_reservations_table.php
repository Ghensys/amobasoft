<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_plan_id');
            $table->foreign('user_plan_id')->references('id')->on('user_plans');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');;
            $table->string('track_id')->nullable();
            $table->timestamp('reservation_start');
            $table->timestamp('reservation_end');
            $table->integer('route_stop_origin_id');
            $table->integer('route_stop_destination_id');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
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
        Schema::dropIfExists('reservations');
    }
}
