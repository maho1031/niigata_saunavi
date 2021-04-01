<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaunasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saunas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('city_id');
            $table->string('address');
            $table->unsignedBigInteger('holiday_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('price');
            $table->string('tag_checks')->nullable();
            $table->string('pic1');
            $table->string('pic2')->nullable();
            $table->string('pic3')->nullable();
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
        Schema::dropIfExists('saunas');
    }
}
