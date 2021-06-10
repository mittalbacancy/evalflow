<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    //
   	protected $table = 'role_user';
    protected $fillable = ['role_id','user_id'];

    public function users()
	{
	  return $this->belongsTo('App\User','user_id')->select('id','first_name','last_name');
	}
	
}
