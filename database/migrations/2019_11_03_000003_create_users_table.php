<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');           
            $table->string('last_name');
            $table->longText('profile')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number');             
            $table->char('gender');
            $table->integer('points_earned')->nullable();
            $table->string('kulliyyah')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
