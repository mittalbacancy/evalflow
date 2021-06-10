<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DoctorSurvey extends Model
{
	protected $table = "doctor_survey";
	
    protected $fillable = [
        'doctor_id', 'survey_id'
    ];
}
