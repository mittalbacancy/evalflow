<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail,DB,Carbon\Carbon;
use PHPMailer\PHPMailer;
use App\User;
use App\PasswordReset;
use Illuminate\Support\Str;
use Hash;

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

    public function reset(Request $request)
    {
        //dump('here');exit;
        $token = $request->token;
        $request->validate($this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        /*$response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );*/
        $token = urldecode($token);
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset){
            $response = '';
        }else{
            $user = User::where('email',$request->email)->first();
            if(!$user){
                $response = Password::INVALID_USER;
            }else{
                $this->resetPassword($user, $request->password);
                $response = Password::PASSWORD_RESET;    
            }
            
        }

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($request, $response)
                    : $this->sendResetFailedResponse($request, $response);
    }
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user->toArray()));

        $this->guard()->login($user);
    }
}
