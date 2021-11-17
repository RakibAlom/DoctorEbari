<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->id('diag_id');
            $table->string('name');
            $table->string('slug');
            $table->string('phone')->nullable();
            $table->string('hotline')->nullable();
            $table->string('address')->nullable();
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->integer('call_status')->default(1);
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
        Schema::dropIfExists('diagnostics');
    }
}
