<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaunaTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sauna_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('sauna_id');
            $table->unsignedBigInteger('tag_id');
            $table->primary(['sauna_id', 'tag_id']);
            $table->foreign('sauna_id')->references('id')->on('saunas')->OnDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->OnDelete('cascade');
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
        Schema::dropIfExists('sauna_tag');
    }
}
