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
          $table->string('question');
          $table->string('A');
          $table->string('B');
          $table->string('C');
          $table->string('D');
          $table->string('solution');
          $table->integer('course_id')->unsigned();
          $table->string('label');
          $table->boolean('isPic')->default(0);
          $table->boolean('lock')->default(1);
          $table->integer('seconds')->default(60);
          $table->integer('chapter');
          $table->timestamps();
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
