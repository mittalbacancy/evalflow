<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ShiftSchedule extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'decription', 'start_date', 'end_date', 'surveylist_id','event_id','event_link'
    ];

}
