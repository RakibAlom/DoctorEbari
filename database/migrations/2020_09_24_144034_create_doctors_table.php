<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id('doc_id');
            $table->unsignedBigInteger('department_id');
            $table->string('name');
            $table->string('slug');
            $table->string('phone')->nullable();
            $table->string('hotline')->nullable();
            $table->string('designation')->nullable();
            $table->string('sur_name')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('upzila_id');
            $table->integer('status')->default(1);
            $table->integer('h_status')->default(0);
            $table->integer('sms_status')->default(1);
            $table->text('keywords')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
