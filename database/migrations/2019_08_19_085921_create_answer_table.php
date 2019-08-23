<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->unsignedInteger('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions');
            $table->unsignedInteger('user_survey_id')->unsigned();
            $table->foreign('user_survey_id')->references('id')->on('user_surveys');
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
        Schema::dropIfExists('answers');
    }
}
