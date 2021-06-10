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
}
