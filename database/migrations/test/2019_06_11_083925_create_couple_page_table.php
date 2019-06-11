<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouplePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couple_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('soon_to_wed_id');
            $table->foreign('soon_to_wed_id')->references('id')->on('soon_to_weds');
            $table->text('couple_page');
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
        Schema::dropIfExists('couple_pages');
    }
}
