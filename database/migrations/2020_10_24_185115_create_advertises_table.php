<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->string('image1')->nullable();
            $table->string('image1_link')->nullable();
            $table->string('image2')->nullable();
            $table->string('image2_link')->nullable();
            $table->string('animation');
            $table->string('animation_link')->nullable();
            $table->string('video')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertises');
    }
}
