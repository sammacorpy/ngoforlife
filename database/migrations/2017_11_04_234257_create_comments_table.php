<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->string('comments');
            $table->integer('newsfeed_id')->unsigned();
            $table->foreign('newsfeed_id')->references('id')->on('newsfeeds')->onDelete('cascade')->onUpdate('cascade');
            $table->string('username',100);
            $table->foreign('username')->references('username')->on('usersdatas')->onDelete('cascade')->onUpdate('cascade');
            

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
        Schema::dropIfExists('comments');
    }
}
