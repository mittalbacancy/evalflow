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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Model\Hospital;
use App\Model\Department;


class AdminController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backend.templates.dashboard');
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'ROLE_ADMIN');
        })->orderBy('created_at', 'desc')->get();


        // if(Auth::user()->hasRole("ROLE_HOSPITAL"))
        //  {
        //    $users = User::whereHas('roles', function ($query) {
        //    $user = Auth::user();
        //    $query->where('name', '=', 'ROLE_USER')->where('hospital_id', '=',$user->hospital_id);
        // })->orderBy('created_at', 'desc')->get();
        //  }

        return view('backend.admin.index', compact('users'));
    }


    /**
     * Show the form for creating a new users.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole("ROLE_ADMIN")){
            $hospitals =DB::table('hospitals')
            ->where('active',1)
            ->get()->toArray();
        $departments= Department::all()->toArray();
        }
        else
        {
        $user = Auth::user();
        $hospitals = DB::table('hospitals')
                     ->where('active',1)
                     ->where('id', '=',$user->hospital_id)
                     ->get()->toArray();
        $departments= Department::all()->toArray();
        }

        
        return view('backend.admin.create', compact('hospitals','departments') );
    }

    /**
     * Store a newly created users in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'=>'required|email|unique:users'

        ]);

        $avatarName = "default_user.png";
        if($request->hasFile('avatar')) {  

            $avatarName = 'user_avatar'.time().'.'.$request->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars',$avatarName);
        }

        $user = new User([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'password' => bcrypt($request->get('password')),
            'qualification' => $request->get('qualification'),
            'hospital_id' => $request->get('hospital'),
            'department_id' => $request->get('department'),
            'active' => $request->get('active'),
            'image' => $avatarName,
            'email' => $request->get('email')            
        ]);
        $user->save();
        $user->roles()->attach(Role::where('name', 'ROLE_ADMIN')->first());
        
        return redirect('admin/admin')->with('success', 'Admin added successfully!');
    }

    /**
     * Display the specified users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        return view('backend.admin.edit', compact('user'));  
    }

    /**
     * Show the form for editing the specified users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Anothre resident can't edit id
    public function resident_restriction($id)
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
         // if(Auth::user()->hasRole("ROLE_HOSPITAL"))
         // {
         //    $authorize = $this->resident_restriction($id);
         //    //print_r($authorize);exit;
         //    if($authorize == "unauthorize"){
         //        return redirect('hospital/unauthorize');
         //        exit;
         //    }
         // }
        
        $user = User::find($id);
        $hospitals = Hospital::where('active',1)->get()->toArray();
        return view('backend.admin.edit', compact('user','hospitals'));
   
    }

     public function add_department(Request $request){

        $hospital_id = $request['id'];
        $department = Department::select('*')
                           ->where('hospital_id', '=', $hospital_id)
                           ->get();
       echo json_encode(array('status'=>true,'data'=>$department));


    }

    /**
     * Update the specified users in storage.
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

        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->active = $request->get('active');

        // if($request->get('password')){
        //     $user->password =  bcrypt($request->get('password'));    
        // }

        if($request->get('hospital')){
            $user->hospital_id =  $request->get('hospital');    
        }  
        if($request->get('department')){
            $user->department_id =  $request->get('department');    
        }
        
        $oldimg = $user->image;
       
        if($request->hasFile('avatar')) {  

            $avatarName = $id.'_avatar'.time().'.'.$request->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars',$avatarName);
            $user->image = $avatarName;

            if(Storage::exists('avatars/'.$oldimg)) {
                Storage::delete('avatars/'.$oldimg);
            } 
            
        }
        
        $user->save();

        return redirect('admin/admin')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified users from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        DB::table('role_user')->where('user_id', $id)->delete();

        return redirect('admin/admin')->with('success', 'Admin deleted !');
    }

    /** 
     * User profile update 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function updateProfile(Request $request) 
    { 
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',            
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
       
        if($request->get('password')){
            $user->password =  bcrypt($request->get('password'));    
        }

        if ($request->hasFile('avatar')) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

            $request->avatar->storeAs('avatars',$avatarName);

            $user->image = $avatarName;
        }
        
        $user->save();

        return redirect('admin/admin')->with('success', 'Admin profile updated successfully!');
    } 

    /**
     * Show the form for profile the specified users.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();
        return view('backend.users.profile', compact('user')); 
    }


   
}
