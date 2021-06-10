<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyTrackList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_track_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('survey_id');
            $table->string('survey_title')->nullable();
            $table->string('preview_url')->nullable();
            $table->string('survey_qrcode')->nullable();
            $table->string('brief_text')->nullable();
            $table->string('urlcode')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('requestby');
            $table->tinyInteger('scheduled')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('requestby')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('survey_track_list');
    }
}
