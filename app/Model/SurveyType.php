<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SurveyType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $table = "survey_type";
   protected $fillable = [
        'survey_type'
    ];
}
