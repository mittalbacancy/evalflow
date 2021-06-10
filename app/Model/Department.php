<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'dpt_name'
    ];
    
}
