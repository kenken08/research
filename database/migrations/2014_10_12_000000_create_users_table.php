<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role'); //1 for regular users & 0 for admin
            $table->string('fname');
            $table->string('sname');
            $table->string('minitial');
            $table->string('email')->unique();
            $table->string('programid');
            $table->string('collegeid');
            $table->string('studentid');
            $table->string('password');
            $table->string('position');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
