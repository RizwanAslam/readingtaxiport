<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('vehical_id');
            $table->foreign('vehical_id')->references('id')->on('bookings');
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->text('flightinfo')->nullable();
            $table->string('flightphone')->nullable();
            $table->char('meetgreet',4)->nullable();
            $table->text('aditionalinfo')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
