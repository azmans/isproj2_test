<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('response_date')->nullable();
            $table->unsignedBigInteger('soon_to_wed_id');
            $table->foreign('soon_to_wed_id')->references('id')->on('soon_to_weds');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email')->nullable()->unique();
            $table->unsignedBigInteger('meal_type_id');
            $table->foreign('meal_type_id')->references('id')->on('meal_types');
            $table->string('allergy')->nullable();
            $table->boolean('plus_one')->default(0)->nullable();
            $table->boolean('is_attending')->default(1)->nullable();
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
        Schema::dropIfExists('guests');
    }
}
