<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soon_to_wed_id');
            $table->foreign('soon_to_wed_id')->references('id')->on('soon_to_weds');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->text('notes')->nullable();
            $table->boolean('fully_paid')->default(0)->nullable();
            $table->boolean('deposit_paid')->default(0)->nullable();
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
        Schema::dropIfExists('my_clients');
    }
}
