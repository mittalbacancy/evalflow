<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $table = "answers";
    protected $fillable = [
        'question_id', 'survey_template_id','answer_type','option_1','option_2', 'option_3','option_4','code1','code2','code3','code4','dd_options','dd_code'
    ];
}
