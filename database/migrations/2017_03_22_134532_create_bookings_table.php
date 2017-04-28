<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("vehicle_id")->nullable();
            $table->integer("hotel_id")->nullable();
            $table->integer("organization_id");
            $table->string("firstname");
            $table->string("lastname");
            $table->string("email");
            $table->string("phone");
            $table->string("id_number");
            $table->string("ticketno");
            $table->string("origin")->nullable();
            $table->string("destination")->nullable();
            $table->datetime("travel_date")->nullable();
            $table->date("arrival_time")->nullable();
            $table->date("departure_date")->nullable();
            $table->string("seatno")->nullable();
            $table->string("roomnumber_id")->nullable();
            $table->integer("event_id")->nullable();
            $table->float("amount",15,2);
            $table->string("status");
            $table->integer("is_refunded")->nullable();
            $table->date("date");
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
        Schema::dropIfExists('bookings');
    }
}