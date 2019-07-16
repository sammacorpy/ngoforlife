<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('adharno',25);
            $table->string('bloodgrp',5);
            $table->string('curr_street');
            $table->string('curr_city');
            $table->string('curr_state');
            $table->string('curr_country');
            $table->string('curr_zip');
            $table->string('perm_street');
            $table->string('perm_city');
            $table->string('perm_state');
            $table->string('perm_country');
            $table->string('perm_zip');
            $table->string('guardian_f');
            $table->string('guardian_l');
            $table->string('guardian_cellno');
            $table->string('mobile_no');
            $table->string('job_id');
            $table->string('occupation');
            $table->string('dob');
            
        


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
        Schema::dropIfExists('userprofiles');
    }
}
