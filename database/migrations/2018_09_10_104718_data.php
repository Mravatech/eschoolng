<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('formatted_address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('icon')->nullable();
            $table->string('google_id')->nullable();
            $table->string('place_id')->nullable();
            $table->string('rating')->nullable();
            $table->string('reference')->nullable();
            $table->string('pagetoken')->nullable();
            $table->string('photos')->nullable();
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
        //
    }
}
