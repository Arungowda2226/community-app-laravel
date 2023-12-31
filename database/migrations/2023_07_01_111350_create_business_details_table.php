<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('organisation_name');
            $table->string('organisation_address');
            $table->string('organisation_state');
            $table->string('organisation_city');
            $table->string('organisation_country');
            $table->string('organisation_phone');
            $table->string('organisation_email');
            $table->string('organisation_photos');
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
        Schema::dropIfExists('business_details');
    }
}
