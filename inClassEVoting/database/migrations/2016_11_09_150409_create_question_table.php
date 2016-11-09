<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('questions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('A');
          $table->string('B');
          $table->string('C');
          $table->string('D');
          $table->string('solution');
          $table->integer('course_id');
          $table->string('label');
          $table->boolean('isPic');
          $table->integer('admin_id');
          $table->boolean('lock');
          $table->timestamps();
          $table->foreign('admin_id')->references('id')->on('users');
          $table->foreign('course_id')->references('id')->on('course');
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('questions');

    }
}