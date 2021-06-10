<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

   
public function redirectTo(){
    // User role

    $user = \Auth::user();
     
     $role = $user->roles->first()->name;
  
    // Check user role
    switch ($role) {
      
        case 'ROLE_HOSPITAL':
                return '/hospital/users';
            break;
        case 'ROLE_ADMIN':
                return '/admin/users';
            break; 
        default:
                return '/home'; 
            break;
    }
}

    // protected $redirectTo = '/admin/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
