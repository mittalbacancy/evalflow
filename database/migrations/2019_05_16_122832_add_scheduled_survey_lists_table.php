<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddScheduledSurveyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('survey_lists', function (Blueprint $table) {
            $table->unsignedTinyInteger('scheduled')->default(0)->after('requestby');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('survey_lists', function (Blueprint $table) {
            $table->dropColumn('scheduled');
        });
    }
}
