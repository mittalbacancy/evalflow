<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'id','survey_name', 'surv_id'
    ];
}
