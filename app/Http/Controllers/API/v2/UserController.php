<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Notifications\SignupActivate;
use App\Role;
use Illuminate\Support\Facades\Storage;
use App\Model\Hospital;
use Mail;
use Illuminate\Support\Facades\DB;


class UserController extends Controller 
{
	public $successStatus = 200;
/** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(Request $request){ 

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = request(['email', 'password']);
        $credentials['active'] = 1;
        
        if(!Auth::attempt($credentials))
            return response()->json(['message'=>'The email and password you entered does not match our records or your account is inactive.','status'=>401], $this-> successStatus); 

        $user = Auth::user(); 
        $user['token'] = $user->createToken('MyApp')->accessToken;         
        if($user->image){
            $user['image'] =  Storage::url('avatars/'.$user->image);
        }else{
            $user['image'] =  Storage::url('avatars/default_user.png');
        }
        
        $userupd = User::find($user['id']);
        $userupd->device_token =  $request->get('device_token');
        $userupd->save();

        return response()->json(['data' => $user,'message' => '','status'=>$this-> successStatus],$this-> successStatus ); 

       
    }

    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        
        $validator = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'hospital_id' => 'required',
            'department_id' => 'required' 
        ]);
	       if ($validator->fails()) { 
	            // /return response()->json(['error'=>$validator->errors()], 401);
                $error = json_decode($validator->errors());                
                return response()->json(['message'=>$error->email[0],'status'=>401,'data'=>array()], 200);            
	        }
			$input = $request->all(); 
	        $input['password'] = bcrypt($input['password']); 
            $input['activation_token'] = str_random(60);
	        $user = User::create($input); 


            $user->roles()->attach(Role::where('name', 'ROLE_USER')->first());

	        $user['token'] =  $user->createToken('MyApp')->accessToken; 
	        $success['name'] =  $user->name;
            $user['hospital_id'] = $user->hospital_id;
            $user['department_id'] = $user->department_id;

	        //$success['name'] =  $user->email;
		//return response()->json(['success'=>$success], $this-> successStatus); 
            try{
            	$user->notify(new SignupActivate($user));
            } catch(\Exception $e){

            }
            /************ Send email to Admin  ***********/

            $data['title'] = "New user register in your app:";
            $data['useremail'] = $input['email'];
            $data['username'] = $input['first_name'].' '.$input['last_name'];
            $data['hospital_id'] = $input['hospital_id'];
            $data['department_id'] = $input['department_id'];

            try{
	            Mail::send('emails', $data, function($message) {
	                $message->to('connectthatapp@gmail.com', '')->subject
	                    ('New User Register');
	                $message->from('connectthatapp@gmail.com','Admin');
	            });
            } catch(\Exception $e){

            }
            /************ Send email to Admin  ***********/
            
            return response()->json(['data' => $user,'message' => 'User is registered successfully.','status'=>$this-> successStatus],$this-> successStatus ); 
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        //return response()->json(['success' => $user], $this-> successStatus); 
        return response()->json(['data' => $user,'message' => '','status'=>$this-> successStatus],$this-> successStatus ); 
    } 

    /** 
     * Signup Activate api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function signupActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.'
            ], 404);
        }
        $user->active = 1;
        $user->email_verified_at = date('Y-m-d h:s:i');
        $user->activation_token = '';
        $user->save();
        //return $user;
        return response()->json(['data' => $user,'message' => 'Your account activated successfully','status'=>$this-> successStatus],$this-> successStatus ); 
    }

  
    // public function doctorList(Request $request) 
    // { 
    //     //$user = User::All(); 
    //     $user = User::whereHas('roles', function ($query) {
    //         $query->where('name', '=', 'ROLE_DOCTOR');
    //     })->get()->toArray();
        
    //     //return response()->json(['success' => $user], $this-> successStatus); 
    //     return response()->json(['data' => $user,'message' => '','status'=>$this-> successStatus],$this-> successStatus ); 
    // } 


    /** 
     * User profile api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function editProfile(Request $request) 
    { 

            $validator = Validator::make($request->all(), [ 
            'first_name' => 'required', 
            'last_name' => 'required', 
            'email' => 'required|email',
            'hospital_id' => 'required',
            'department_id' => 'required', 
            //'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) { 
                // /return response()->json(['error'=>$validator->errors()], 401);
                $error = json_decode($validator->errors());                
                return response()->json(['message'=>$error->email[0],'status'=>401,'data'=>array()], 200);            
        }

        $id = Auth::user()->id;        
        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');
        if($request->get('email')){
            $user->email = $request->get('email');    
        }

        if($request->get('hospital_id')){
            $user->hospital_id = $request->get('hospital_id');    
        }

        if($request->get('department_id')){
            $user->department_id = $request->get('department_id');    
        }

        if($request->get('password')){
            $user->password =  bcrypt($request->get('password'));    
        }

        if($request->hasFile('avatar')) {           
            $avatarName = $id.'_avatar'.time().'.'.$request->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars',$avatarName);

            $user->image = $avatarName;
        }

        $user->save();
        $user['image'] = Storage::url('avatars/'.$user->image);

        return response()->json(['data' => $user,'message' => 'Profile updated successfully','status'=>$this->successStatus],$this-> successStatus );
    } 

    /** 
     * Change password
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function changePassword(Request $request) {

        $data = $request->all();
        $user = Auth::user(); 
        if($data['newPassword'] != $data['confirmPassword']){
                return response()->json(['data' => '','message' => 'Confirm password not matching','status'=>401],$this->successStatus );
        }

     
         //Changing the password only if is different of null
         if( isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !=='undefined') {
                 //checking the old password first
                 $check  = Auth::guard('web')->attempt([
                     'email' => $user->email,
                     'password' => $data['oldPassword']
                 ]);
                 
                 if($check == 1 && isset($data['newPassword']) && !empty($data['newPassword']) && $data['newPassword'] !== "" && $data['newPassword'] !=='undefined') {
                    $user->password = bcrypt($data['newPassword']);
                    //$user->isFirstTime = false; //variable created by me to know if is the dummy password or generated by user.
                    
                    //$user->token()->revoke();                    
                    //$token = $user->createToken('MyApp')->accessToken; 

                     //Changing the type
                    $user->save();

                    //return json_encode(array('token' => $token)); //sending the new token
                    return response()->json(['data' => $user,'message' => 'Password updated successfully','status'=>$this->successStatus],$this->successStatus );
                 }
                 else {
                    //return "Wrong password information";
                    return response()->json(['data' => '','message' => 'Wrong password information','status'=>401],$this->successStatus );
                 }
            }

            return response()->json(['data' => '','message' => 'Wrong password information','status'=>401],$this->successStatus );
    }


    /** 
     * Hospital List 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function hospitalList() 
    { 
        $hospitalList = Hospital::where('active',1)->get()->toArray();
        
        return response()->json(['data' => $hospitalList,'message' => '','status'=>$this->successStatus],$this-> successStatus );                 
    } 

    public function departmentList(Request $request) 
    { 
        
        $input = $request->all(); 
        $id = $input['hospital_id'];

        $department = DB::table('departments')
            ->select('departments.*')
            ->where('hospital_id',$id)
            ->get()->toArray();
        //print_r($department);die;

        return response()->json(['data' => $department,'message' => '','status'=>$this->successStatus],$this-> successStatus ); 
        
    } 


    public function notificationSetting(Request $request) 
    { 
        $id = Auth::user()->id;        
        $user = User::find($id);
        $user->notification =  $request->get('notification');

        $response = $user->save();

        return response()->json(['data' => $response,'message' => '','status'=>$this->successStatus],$this-> successStatus );                 
    } 
    


}