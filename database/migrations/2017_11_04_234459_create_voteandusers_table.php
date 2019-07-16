<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteandusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voteandusers', function (Blueprint $table) {
            $table->increments('voteid');
            $table->integer('newsfeed_id')->unsigned();
            $table->foreign('newsfeed_id')->references('id')->on('newsfeeds')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('liked')->default(false);
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voteandusers');
    }
}
