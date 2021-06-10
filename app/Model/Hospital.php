<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'h_name', 'h_city', 'h_address', 'h_image', 'active'
    ];
}
