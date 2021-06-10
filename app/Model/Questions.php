<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
   protected $fillable = [
        'email_template_id', 'question_title','active'
    ];
}
