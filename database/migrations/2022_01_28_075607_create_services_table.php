<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('external_budget_id');
            $table->string('external_route_id');
            $table->integer('track_id')->nullable();
            $table->string('name');
            $table->string('notes')->nullable();
            $table->timestamp('timestamp');
            $table->text('arrival_address');
            $table->timestamp('arrival_timestamp');
            $table->text('departure_address');
            $table->timestamp('departure_timestamp');
            $table->integer('capacity');
            $table->integer('confirmed_pax_count');
            $table->timestamp('reported_departure_timestamp')->nullable();
            $table->integer('reported_departure_kms')->nullable();
            $table->timestamp('reported_arrival_timestamp')->nullable();
            $table->integer('reported_arrival_kms')->nullable();
            $table->integer('reported_vehicle_plate_number')->nullable();
            $table->decimal('status', 5, 0);
            $table->json('status_info');
            $table->integer('reprocess_status');
            $table->integer('return');
            $table->timestamp('created');
            $table->timestamp('modified');
            $table->integer('synchronized_downstream')->nullable();
            $table->integer('synchronized_upstream')->nullable();
            $table->integer('province_id');
            $table->integer('sale_tickets_drivers');
            $table->string('notes_drivers');
            $table->text('itinerary_drivers');
            $table->double('cost_if_externalized', 20, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
