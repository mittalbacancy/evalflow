<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MileStoneCode extends Model
{
    protected $table = "milestone_code";
    protected $fillable = [
        'survey_m_code'
    ];
}
