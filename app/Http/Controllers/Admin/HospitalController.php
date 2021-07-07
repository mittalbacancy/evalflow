<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Hospital;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Role;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
use App\Model\Department;
use Mail;
use App\User;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;



class HospitalController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');       
    }
   
    /**
     * Display a listing of the Hospital.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospitals = Hospital::all()->toArray();        
        return view('backend.hospital.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
       
        return view('backend.hospital.create');
    }

    /**
     * Store a newly created Hospital in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $request->validate([
            'h_name'=>'required',
            'h_city'=>'required',
            'h_address'=>'required',
            'h_email'=>'required|email|unique:hospitals',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dpt_name.*' => 'required',
        ]);

        if ($request->hasFile('avatar')) {
            $avatarName = 'hosp_img'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('hospital',$avatarName);
        }    

            $hospital = new Hospital;
            $hospital->h_name = $request->get('h_name');
            $hospital->h_city = $request->get('h_city');
            $hospital->h_address = $request->get('h_address');
            $hospital->h_email = $request->get('h_email');
            $hospital->active =$request->get('active');
            $hospital->h_image = $avatarName;
            $hospital_id = $hospital->save();
            $insert_id = $hospital->id;

            $this->addMorePost($request,$insert_id);

            $this->hospital_register($request,$insert_id);
        
        return redirect('admin/hospitals')->with('success', 'Hospital added successfully, You have recieve an email for set password');
    }

    //hospital register

        public function hospital_register(Request $request,$insert_id) 
    { 
       
        $avatarName = 'ht_img'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        // $surveyData = [];
        // $surveyChk = $request->get('survey_chk');
        
           $hospital = new User([
            'first_name' => $request->get('h_name'),
            'email' => $request->get('h_email'),
            'active' => $request->get('active'),
            'hospital_id' => $insert_id,
            'image' => $avatarName
                  
        ]);
           $email_address = $request->get('h_email');

  
        $hospital->save();
        $hospital->roles()->attach(Role::where('name', 'ROLE_HOSPITAL')->first());
        $hospitalid = $hospital->id;

        $credentials = ['email' => $email_address];
        $response = Password::sendResetLink($credentials, function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        // switch ($response) {
        //     case Password::RESET_LINK_SENT:
        //         return redirect()->back()->with('status', trans($response));
        //     case Password::INVALID_USER:
        //         return redirect()->back()->withErrors(['email' => trans($response)]);
        // }


      

        // DoctorSurvey::insert($surveyData);

            // Mail::send('emails', $data, function($message) {
            //     $message->to('shrutipatel@bacancytechnology.com', '')->subject
            //         ('New User Register');
            //     $message->from(env('MAIL_USERNAME'),'Admin');
            // });

            /************ Send email to Admin  ***********/
            
           
    }

    //  public function addMore()
    // {
        
    //     return view('backend.hospital.create');
    // }

    public function addMorePost(Request $request,$insert_id)
    {
        //echo 1;exit;
        if(!empty($request->get('dpt_name'))){
            $dpt_names = $request->get('dpt_name');     
        }else if(!empty($request->get('dpt_name_add'))){
            $dpt_names = $request->get('dpt_name_add');    
        }
            $department = [];
       
           $insert_id = $insert_id;

            if (!empty($dpt_names)) {
               foreach($dpt_names as $dpt_name){
                    if(!empty($dpt_name)){
                        $department[]=array('hospital_id'=>$insert_id,'dpt_name'=>$dpt_name);    
                    }
                }
            }
            
           if(!empty($department)){
            DB::table('departments')->insert($department); 
           }
        
    }

    /**
     * Display the specified Hospital.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('backend.hospital.edit', compact('hospital'));  
    }

    /**
     * Show the form for editing the specified hospital.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $hospital = Hospital::find($id);
        //$department = Department::where("hospital_id",$id)->select();
        $departments = Department::select('dpt_name','id')
                           ->where('hospital_id', '=', $id)
                           ->get();
       
        return view('backend.hospital.edit', compact('hospital','departments')); 
    }

    /**
     * Update the specified hospital in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $dpt_id = $request['dpt_name_edit'];
               
        $request->validate([
            'h_name'=>'required',
            'h_city'=>'required',
            'h_address'=>'required',
            'dpt_name_edit.*'=>'required',
            'dpt_name_add.*'=>'required'            
        ]);

        $hospital = Hospital::find($id);
        $hospital->h_name =  $request->get('h_name');
        $hospital->h_city = $request->get('h_city');
        $hospital->h_address = $request->get('h_address');
        $hospital->active = $request->get('active');
       
       if(!empty($dpt_id)){
             foreach ($dpt_id as $key => $value) {

                DB::table('departments')
                ->where('id', $key)
                ->update(['dpt_name' => $value]);
              
            }
       }
        
        if ($request->hasFile('avatar')) {
        
            $avatarName = 'hosp_img'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('hospital',$avatarName);
            
            $hospital->h_image = $avatarName;
        }

        $hospital->save();
        $this->addMorePost($request,$id);
       // $department->save();

        return redirect('admin/hospitals')->with('success', 'Hospital updated successfully!');
    }

    /**
     * Remove the specified hospital from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();

        return redirect('admin/hospitals')->with('success', 'Hospital deleted!');
    }


   
}
