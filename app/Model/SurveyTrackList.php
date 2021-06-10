<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyTrackList extends Model
{
    protected $table = "survey_track_list";

    protected $fillable = [
        'survey_id', 'survey_title', 'user_id', 'preview_url', 'survey_qrcode', 'brief_text', 'urlcode', 'requestby', 'scheduled'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
