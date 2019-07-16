<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profimages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profile_image');
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
        Schema::dropIfExists('profimages');
    }
}
