<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('survey_id');
            $table->string('survey_title')->nullable();
            $table->string('preview_url')->nullable();
            $table->string('survey_qrcode')->nullable();
            $table->text('brief_text')->nullable();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('requestby');
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
        Schema::dropIfExists('survey_lists');
    }
}
