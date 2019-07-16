<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacydatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacydatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->string('mobile_no',50);
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->time('availhoursbegin');
            $table->time('availhoursend');
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
        Schema::dropIfExists('pharmacydatas');
    }
}
