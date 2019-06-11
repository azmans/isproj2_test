<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoonToWedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soon_to_weds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_type', 15)->default('soon-to-wed');
            $table->string('bride_first_name', 30);
            $table->string('bride_last_name', 30);
            $table->string('groom_first_name', 30)->nullable();
            $table->string('groom_last_name', 30)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('dob');
            $table->date('wedding_date');
            $table->string('profile_picture')->default('user.png')->nullable();
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
        Schema::dropIfExists('soon_to_weds');
    }
}
