<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answer', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('survey_track_id');
            $table->unsignedInteger('survey_id');
            $table->unsignedInteger('submitted_by');
            $table->unsignedInteger('question_id');
            $table->string('answer_id');
            $table->timestamps();

            $table->foreign('survey_track_id')
                ->references('id')
                ->on('survey_track_list')
                ->onDelete('cascade');

            $table->foreign('survey_id')
                ->references('id')
                ->on('survey_email_template')
                ->onDelete('cascade');

            $table->foreign('submitted_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_answer');
    }
}
