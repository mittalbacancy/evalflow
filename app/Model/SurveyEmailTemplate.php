<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyEmailTemplate extends Model
{
   protected $table = "survey_email_template";
   protected $fillable = [
        'survey_name','survey_type_id'
    ];
}
