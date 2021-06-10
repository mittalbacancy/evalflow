<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   
    //protected $redirectTo = '/login';
  // return redirect()->route('login');

     protected function redirectTo()
{
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
