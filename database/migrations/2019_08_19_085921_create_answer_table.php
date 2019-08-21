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
            $table->unsignedInteger('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys');
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
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('answer_question_id_foreign');
            $table->dropColumn('question_id');
            $table->dropForeign('answer_survey_id_foreign');
            $table->dropColumn('survey_id');
        });
        Schema::dropIfExists('answers');
    }
}
