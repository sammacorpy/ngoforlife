<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctersdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctersdatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('bloodgrp',5);
            $table->string('adharno',25);
            $table->string('education_details');
            $table->string('offi_street');
            $table->string('offi_city');
            $table->string('offi_state');
            $table->string('offi_country');
            $table->string('offi_zip');
            $table->string('perm_street');
            $table->string('perm_city');
            $table->string('perm_state');
            $table->string('perm_country');
            $table->string('perm_zip');
            $table->string('mobile_no');
            $table->string('dob');
            $table->string('experience');
            $table->string('specs');
            $table->string('worksinhospital');
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
        Schema::dropIfExists('doctersdatas');
    }
}
