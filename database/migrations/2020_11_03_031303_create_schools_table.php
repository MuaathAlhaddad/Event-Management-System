<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('location')->nullable();
            $table->float('registration_fee',8,2)->nullable();
            $table->text('curriculum')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->json('student_nationalities')->nullable();
            $table->json('no_student_class')->nullable();
            $table->boolean('published')->default(0);
            $table->string('website')->nullable();
            $table->json('social_media')->nullable();
            $table->string('application_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
