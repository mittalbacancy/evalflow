<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\PasswordReset;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class PasswordResetController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {

        $this->validateEmail($request);
         try{
            $response = $this->broker()->sendResetLink(
			     $request->only('email')
		    );
            $email = $request->email;
            $user_email = User::where('email', $email)->first();
            if(!empty($user_email)){
                return $response == Password::RESET_LINK_SENT
                    ? response()->json(['message' => 'Reset link sent to your email.', 'status' => true], 200)
                    : response()->json(['message' => 'Unable to send reset link', 'status' => true], 401);
           } else{
            return response()->json(['message' => 'Email does not exist', 'status' => true], 200);
           }
        } catch(\Exception $e){
            return response()->json(['message' => "We can't send recovery email. Please contact admin.", 'rstatus' => false], 200);
        }

		
    }
    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        return response()->json($passwordReset);
    }
     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['emai', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => 'We can not find a user with that e-mail address.'
            ], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        try{
            $user->notify(new PasswordResetSuccess($passwordReset));
        } catch(\Exception $e){

        }
        return response()->json($user);
    }
}
