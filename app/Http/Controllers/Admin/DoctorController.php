<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Role;
use App\Notifications\SignupActivate;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Model\Hospital;
use App\Model\SurveyEmailTemplate;
use App\Model\Survey;
use App\Model\DoctorSurvey;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Model\Department;
use App\Model\SurveyType;

class DoctorController extends Controller
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
     * Display a listing of the doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole("ROLE_ADMIN"))
        {

        $doctors = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'ROLE_DOCTOR');
        })->orderBy('created_at', 'desc')->get();

        }
        else
        {
            
        $doctors = User::whereHas('roles', function ($query) {
        $user = Auth::user();
        $query->where(['name'=> 'ROLE_DOCTOR','hospital_id' => $user->hospital_id]);
        })->orderBy('created_at', 'desc')->get();

        }
        return view('backend.doctor.index', compact('doctors'));
    }
    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hospitals = Hospital::all()->toArray(); 

        if(Auth::user()->hasRole("ROLE_HOSPITAL"))
         {
            $user = Auth::user();
            $hospitals = Hospital::where('id', '=',$user->hospital_id)->get()->toArray();
         }

        $survey= SurveyEmailTemplate::all()->toArray();
        $departments= Department::all()->toArray();
        $survey_types= SurveyType::all()->toArray();
       
        return view('backend.doctor.create', compact('hospitals','survey','departments','survey_types'));
    }
    /**
     * Store a newly created doctors in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=>'required|email|unique:users'
        ]);
        $avatarName = 'dtr_img'.time().'.'.request()->avatar->getClientOriginalExtension();
        $request->avatar->storeAs('avatars',$avatarName);
        $surveyData = [];
        $surveyChk = $request->get('survey_chk');
        
        $doctor = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => bcrypt($request->get('password')), 
            'active' => $request->get('active'),
            'qualification' => $request->get('qualification'),
            'hospital_id' => $request->get('hospital'),
            'department_id' => $request->get('department'),
            'image' => $avatarName,
            'email' => $request->get('email') ,
            'mobilenumber' => $request->get('mobilenumber'),           
        ]);
        $doctor->save();
        $doctor->roles()->attach(Role::where('name', 'ROLE_DOCTOR')->first());
        $doctorid = $doctor->id;
        foreach ($surveyChk as $value) {
            array_push($surveyData, [
                'doctor_id'     => $doctorid,
                'survey_id'     => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DoctorSurvey::insert($surveyData);
        
        return redirect('admin/doctors')->with('success', 'Doctors added successfully!');
    }
    /**
     * Display the specified doctors.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::find($id);
        return view('backend.doctor.edit', compact('doctor'));  
    }
    /**
     * Show the form for editing the specified doctors.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Anothre doctor can't edit id
    public function doctor_restriction($id)
    {
        $auth_user = Auth::user(); 
        $hospital_id = $auth_user->hospital_id;
       
        $user = User::find($id);
        if(!empty($user))
        {

        $user_id = $user->id;
          
        $check_users = DB::table('users')
                    
                     ->leftJoin('role_user','role_user.user_id','=','users.id')
                     ->where('role_user.user_id', '=',$user_id)
                     ->where('users.hospital_id', '=',$hospital_id)
                     ->first();
        if(empty($check_users))
        {
            return "unauthorize";
            
        }

        }

        else{

            return "unauthorize";
          
        }
                

    }
    public function edit($id)
    {

        if(Auth::user()->hasRole("ROLE_HOSPITAL"))
         {
            $authorize = $this->doctor_restriction($id);
            //print_r($authorize);exit;
            if($authorize == "unauthorize"){
                return redirect('hospital/unauthorize');
                exit;
            }
         }

         
        $doctor = User::find($id);
        $hospitals = Hospital::all()->toArray();  
        $start_yr = getFinancialStartDate();
        $end_yr   = getFinancialEndDate();
                
        $selsurvey = DoctorSurvey::select('survey_id')->where('doctor_id',$id)->get()->toArray();
        $survey = SurveyEmailTemplate::select('id','survey_name')->whereBetween('created_at',[$start_yr,$end_yr])->get()->toArray();
        return view('backend.doctor.edit', compact('doctor','hospitals','survey','selsurvey'));
    }
    public function add_department(Request $request){

        $hospital_id = $request['id'];
        $department = Department::select('*')
                           ->where('hospital_id', '=', $hospital_id)
                           ->get();
       echo json_encode(array('status'=>true,'data'=>$department));


    }
    /**
     * Update the specified doctors in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);
        $doctor = User::find($id);
        // echo "<pre>";
        // print_r($doctor->department_id);exit;
        $doctor->first_name =  $request->get('first_name');
        $doctor->last_name = $request->get('last_name');
        $doctor->email = $request->get('email');
        $doctor->mobilenumber = $request->get('mobilenumber');
        $doctor->active = $request->get('active');
        $doctor->qualification = $request->get('qualification');
        if($request->get('hospital')){
            $doctor->hospital_id =  $request->get('hospital');    
        } 
        if($request->get('department')){
            $doctor->department_id =  $request->get('department');    
        }       
        if($request->get('password')){
            $doctor->password =  bcrypt($request->get('password'));    
        }
        $surveyData = [];
        $surveyChk = $request->get('survey_chk');
        $oldimg = $doctor->image;
        if ($request->hasFile('avatar')) {
            
            $avatarName = 'dtr_img'.time().'.'.request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars',$avatarName);
            $doctor->image = $avatarName;
            if(Storage::exists('avatars/'.$oldimg)) {
                Storage::delete('avatars/'.$oldimg);
            }
        }
        $doctor->save();
        $affectedRows = DoctorSurvey::where('doctor_id', '=', $id)->delete();
        $doctorid = $id;
        foreach ($surveyChk as $value) {
            array_push($surveyData, [
                'doctor_id'     => $doctorid,
                'survey_id'     => $value,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        // echo "<pre>";
        // print_r($surveyData);exit;
        DoctorSurvey::insert($surveyData);
        return redirect('admin/doctors')->with('success', 'Doctor updated successfully!');
    }
    /**
     * Remove the specified doctors from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = User::find($id);
        $doctor->delete();
        return redirect('admin/doctors')->with('success', 'Doctor deleted!');
    }
   
}