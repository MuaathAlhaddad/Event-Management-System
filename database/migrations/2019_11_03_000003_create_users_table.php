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
            $table->string('name');
            $table->longText('bio')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('sex')->nullable();
            $table->text('country')->nullable();
            $table->text('state')->nullable();
            $table->text('avatar')->nullable();
            $table->date('dob')->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
