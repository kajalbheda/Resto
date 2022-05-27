<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodChefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_chefs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('speciality')->nullable();
            $table->string('image')->nullable();
            $table->string('facebooklink')->nullable();
            $table->string('instalink')->nullable();
            $table->string('twitterlink')->nullable();
            $table->string('googlelink')->nullable();
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
        Schema::dropIfExists('food_chefs');
    }
}
