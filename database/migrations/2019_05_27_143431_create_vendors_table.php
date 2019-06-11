<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_type', 15)->default('vendor');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('mobile', 11)->nullable()->unique();
            $table->string('company_name', 50);
            $table->string('vendor_type', 25);
            $table->string('price_range', 15);
            $table->string('tin', 20)->unique();
            $table->string('sec_dti_number', 25)->unique();
            $table->string('mayors_permit', 20)->unique();
            $table->string('city', 25);
            $table->string('profile_picture')->default('user.png')->nullable();
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
