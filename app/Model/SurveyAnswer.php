<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $table = "survey_answer";

    protected $fillable = [
        'survey_track_id', 'survey_id', 'submitted_by', 'question_id', 'answer_id'
    ];

    public function questions(){
        return $this->belongsTo('App\Model\Questions', 'question_id', 'id');
    }
    public function answers(){
        return $this->belongsTo('App\Model\Answers', 'question_id', 'question_id');
    }
}
