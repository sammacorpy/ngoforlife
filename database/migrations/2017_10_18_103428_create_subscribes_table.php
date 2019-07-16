<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emailid',100)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
