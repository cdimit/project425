<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswer1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('answer1', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('question_id')->unsigned();
          $table->integer('answer');
          $table->integer('semester');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('question_id')->references('id')->on('questions');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('answer1');

    }
}
