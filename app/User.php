<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;




/**
 * @property string name
 * @property string first_name
 * @property string last_name
 * @property string email
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,Notifiable,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'mobilenumber', 'email', 'password','active', 'activation_token','qualification','image','hospital_id','device_token','department_id'];

   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','activation_token'
    ];

    public function getNameAttribute(): string
    {
        $first_name = $this->first_name;
        $last_name = $this->last_name;

        if (!$last_name) {
            return $first_name;
        }

        return $first_name . ' ' . $last_name;
    }

    public function setNameAttribute($name): void
    {
        [$first_name, $last_name] = explode(' ', $name);

        $this->first_name = $first_name;
        $this->last_name = $last_name;
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
          return $this->hasAnyRole($roles) || 
                 abort(401, 'This action is unauthorized.');
      }
      return $this->hasRole($roles) || 
             abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
      //return null !== $this->roles()->where('name', $role)->first();
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }

   
}
