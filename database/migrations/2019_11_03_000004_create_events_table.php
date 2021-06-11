<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('location');
            $table->integer('points');
            $table->integer('max_no_attendees')->nullable();
            $table->integer('moderator_id')->nullable();            
            $table->string('percentage')->nullable();
            $table->json('attendees_ids')->nullable();
            $table->boolean('status')->default(false);
            $table->text('desc')->nullable();
            $table->string('category')->nullable();            
            $table->string('semester');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('recurrence');
            $table->string('profile');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
