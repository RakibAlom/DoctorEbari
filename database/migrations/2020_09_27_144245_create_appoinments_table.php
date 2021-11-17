<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoinmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoinments', function (Blueprint $table) {
            $table->id('appoint_id');
            $table->string('name');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doc_id')->nullable();
            $table->string('age');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('doctor_shown')->nullable();
            $table->string('past_doctor')->nullable();
            $table->text('details')->nullable();
            $table->string('appoint_date');
            $table->string('time')->nullable();
            $table->string('entry_date');
            $table->string('month');
            $table->string('year');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('appoinments');
    }
}
