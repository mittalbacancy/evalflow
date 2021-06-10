<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $table = "survey_answer";

    protected $fillable = [
        'survey_track_id', 'survey_id', 'submitted_by', 'question_id', 'answer_id'
    ];
}
