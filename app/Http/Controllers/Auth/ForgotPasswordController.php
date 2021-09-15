<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use Mail,DB,Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\User;
use Illuminate\Auth\Passwords\PasswordBroker;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {       
        //dump('here');exit;
        $this->middleware('guest');
    }
    
    public function sendResetLinkEmail(Request $request)
    {
        //echo env('MAIL_USERNAME');
        $this->validateEmail($request);
        //setConfig(env('FP_EMAIL'));                
        $response = $this->sendEmail($request);
        /*$response = $this->broker()->sendResetLink(
            $request->only('email')
        );*/                       
        //exit;
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }   
    public function sendEmail($request){

        $user = User::where('email',$request->email)->first();
        //DB::table('users')->where('email',$request->email)->first();        
        if(empty($user)){
            //echo "e";exit;
            return 'passwords.user';
            //$this->sendResetLinkFailedResponse($request, 'passwords.user');
        }       
        //echo "user";exit;
        $token = bcrypt('token');
        //$token = bcrypt(app('auth.password.broker')->createToken($user));
        DB::table('password_resets')->updateOrInsert(['email'=>$request->email],[
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        //dump(env('FP_EMAIL'));
        //dump(env('FP_PASSWORD'));
        $token   = url('/') . '/password/reset/' .urlencode($token);
        try{
                
                $mail             = new PHPMailer(true); // create a n
                $mail->IsSMTP();
                $mail->SMTPDebug = 0;
                $mail->do_debug = 0;
                $mail->Debugoutput = 'html';
                $mail->SMTPAuth   = true; // authentication enabled
                $mail->SMTPSecure = 'tls';//env('MAIL_ENCRYPTION'); // secure transfer enabled REQUIRED for Gmail
                $mail->Host       = 'smtp.gmail.com';
                $mail->Port       = 587;//env('MAIL_PORT'); // or 587
                $mail->IsHTML(true);
                $mail->Username = 'forgotpassword@connectthat.co';
                $mail->Password = env('FP_PASSWORD');
                $mail->SetFrom('forgotpassword@connectthat.co', 'ConnectTHAT');
                $mail->Subject = 'Reset Password Notification';
                $mail->Body    = view('fpEmail', compact('token'))->render();;
                $mail->AddAddress($request->email);

                if ($mail->Send()) {
                    $response = 'passwords.sent';
                } else {
                    $response = $mail->ErrorInfo;
                }
                //dump($response);
                //$response = 'passwords.sent';        
        }catch(\Exception $e){
            //dump($e->getMessage());exit;
            $response = $e->getMessage();            
        } 
        //echo "eeee".$response;
        //exit;  
        return $response;
    }

    public function sendEmail1($request){
        $user = DB::table('users')->where('email',$request->email)->first();        
        if(empty($user)){
            return $this->sendResetLinkFailedResponse($request, 'passwords.user');
        }       
        $token = '$2y$10$'.str_random(53);
        DB::table('password_resets')->updateOrInsert(['email'=>$request->email],[
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        try{
            $data   = array('token'=>url('/') . 'password/reset/' .$token);

            $result = Mail::send('fpEmail', $data, function($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
                $message->from('forgotpassword@connectthat.co','ConnectTHAT');
            }); 
            $response = 'passwords.sent';

        }catch(\Exception $e){
            $response = '';            
        }   
        return $response;
    }
}
