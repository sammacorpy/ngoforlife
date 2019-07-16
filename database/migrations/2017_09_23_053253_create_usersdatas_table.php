<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersdatas', function (Blueprint $table) {
            $table->string('fname');
            $table->string('lname');
            $table->string('username',100)->primary() ;
            $table->string('emailid');
            $table->string('password');
            $table->string('seckey');
            $table->string('verif')->default(false);
            $table->string('job_id',2);
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
        Schema::dropIfExists('usersdatas');
    }
}
