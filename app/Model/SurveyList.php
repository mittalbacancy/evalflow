<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyList extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'survey_id', 'survey_title', 'user_id', 'preview_url', 'survey_qrcode','brief_text','requestby','scheduled','urlcode'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function doctorUser()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function residentUser()
    {
        return $this->belongsTo('App\User','requestby','id');
    }
    public function emailTemplate()
    {
        return $this->belongsTo('App\Model\SurveyEmailTemplate','survey_title','survey_name');
    }
    public function surveyAnswer()
    {
        return $this->hasMany('App\Model\SurveyAnswer','survey_track_id')->orderBy('question_id')->limit(1);
    }
}
