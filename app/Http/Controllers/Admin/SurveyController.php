<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Role;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Model\SurveyList;
use App\Model\Survey;
use App\Model\ShiftSchedule;
use App\Model\SurveyEmailTemplate;
use App\Model\SurveyType;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Twilio;


class SurveyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // view()->share('signedIn', \Auth::check());
 
    }

   
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        if (date('m') <= 06) {
            $financial_year = (date('Y')-1) . '-' . date('Y');
        } else {
        	if (date('d') <= 24) {
            	$financial_year = (date('Y')-1) . '-' . date('Y');
         	} else {
            	$financial_year = date('Y') . '-' . (date('Y') + 1);
         	}
        }
        
        $yrs = explode('-',$financial_year);
        $start_yr = "$yrs[0]-06-25";
        $end_yr = "$yrs[1]-06-24";
           
        //$surveys = SurveyList::all();
         if(Auth::user()->hasRole("ROLE_ADMIN"))
         {
        $surveys = DB::table('survey_lists')
            //->join('users', 'users.id', '=', 'survey_lists.user_id')
            ->join('users', 'users.id', '=', 'survey_lists.requestby')           
            ->select('survey_lists.*','survey_lists.id as surveyid'  ,'users.first_name','users.last_name')
            ->where('scheduled','0')
            ->orderBy('survey_lists.created_at', 'desc')
            ->whereBetween('survey_lists.created_at',[$start_yr,$end_yr])
            ->get()->toArray();
          }
          else
          {
            $user = Auth::user();
            $surveys = DB::table('survey_lists')
            //->join('users', 'users.id', '=', 'survey_lists.user_id')
            ->join('users', 'users.id', '=', 'survey_lists.requestby')           
            ->select('survey_lists.*','survey_lists.id as surveyid'  ,'users.first_name','users.last_name')
            ->where(['scheduled'=>'0','hospital_id' => $user->hospital_id])
            //->where('hospital_id', '=',$user->hospital_id)
            ->orderBy('survey_lists.created_at', 'desc')
            ->whereBetween('survey_lists.created_at',[$start_yr,$end_yr])
            ->get()->toArray();
           
          }

          
        //print_r($surveys);die;
        return view('backend.survey.index', compact('surveys'));
    }

    public function filSurv(Request $request) { 
        $surveys = [];
        $rangeYr = $request->created_at;      
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";

        if(Auth::user()->hasRole("ROLE_ADMIN")){
            $surveys = DB::table('survey_lists')
                //->join('users', 'users.id', '=', 'survey_lists.user_id')
                ->join('users', 'users.id', '=', 'survey_lists.requestby')           
                ->select('survey_lists.*','survey_lists.id as surveyid'  ,'users.first_name','users.last_name')
                ->where('scheduled','0');
                if($start_date && $end_date){
                    $surveys = $surveys->whereBetween('survey_lists.created_at',[$start_date,$end_date]);
                }
                $surveys = $surveys->orderBy('survey_lists.created_at', 'desc')
                ->get()->toArray();
        }else {
            $user = Auth::user();

            $surveys = DB::table('survey_lists')
                //->join('users', 'users.id', '=', 'survey_lists.user_id')
                ->join('users', 'users.id', '=', 'survey_lists.requestby')           
                ->select('survey_lists.*','survey_lists.id as surveyid'  ,'users.first_name','users.last_name')
                ->where(['scheduled'=>'0','hospital_id' => $user->hospital_id]);
                if($start_date && $end_date){
                        $surveys = $surveys->whereBetween('survey_lists.created_at',[$start_date,$end_date]);
                    }
                    $surveys = $surveys->orderBy('survey_lists.created_at', 'desc')
                ->get()->toArray();
        }

        return $surveys;
    }

  

    /**
     * Show the form for editing the specified hospital.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(session('GoogleAccessTokenExpireTime') == "" || session('GoogleAccessTokenExpireTime') < time()) { 
            return redirect('admin/google');
            //echo "dsf";die;
     }
    
        $survey = SurveyList::find($id);
        return view('backend.survey.edit', compact('survey')); 
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

        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'            
        ]);

        $startDate = Carbon::createFromFormat('m-d-Y', $request->get('start_date'))
                ->format('Y-m-d');

        $endDate = Carbon::createFromFormat('m-d-Y', $request->get('end_date'))
                ->format('Y-m-d');
       
        /****************** Set event in google  *******************/

        $GoogleAccessToken = session('GoogleAccessToken');

        $user_timezone = $this->GetUserCalendarTimezone($GoogleAccessToken);

        $curlPost = array(
            'summary' => $request->get('title'),
            'description'=>"Survey",
            'start'=>array('dateTime' =>$startDate.'T'.date('H:s:i'),'timeZone' => $user_timezone),
            'end' =>array('dateTime' =>$endDate.'T'.date('H:s:i'),'timeZone' => $user_timezone),
            'reminders' => array(
                'useDefault' => FALSE,
                'overrides' => array(
                    array('method' => 'email', 'minutes' => date('s')),
                    array('method' => 'popup', 'minutes' => date('s')),
                ),
            ),
        );
     
        
        $result = $this->CreateCalendarEvent('haa682mpcv5k9a12f556034ukc@group.calendar.google.com', $curlPost,$GoogleAccessToken);

       
        $event_id = $result['id'];          
        session(['event_id' => $event_id]);
        //session(['htmlLink' => $result['htmlLink']]);
        
        /******************* Set event in google end ********************/

        $shiftSchedule = new ShiftSchedule([
            'title' => $request->get('title'),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'event_id' => $event_id,
            'event_link' => $result['htmlLink'],
            'surveylist_id' => $id
        ]);

        $update = $shiftSchedule->save();

        if($update){
            $surveyList = SurveyList::find($id);
            $surveyList->scheduled =  1;
            $surveyList->save();
        }

        return redirect('admin/surveyrequest')->with('success', 'Scheduled updated successfully!');
    }
    
    /**
     * Remove the specified users from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroySurveyList($id)
    {

        $surveylist = SurveyList::find($id);
        $surveylist->is_deleted = 1;
        $surveylist->save();
        return redirect('admin/viewsurvey')->with('success', 'SurveyList deleted!');
    }


    public function  accessToken() {

        Session::forget('GoogleAccessToken');
        $redirecturi = "https://connectthat.co/admin/getcode";
        
        $clid = '368283194415-q30kj2ef7r6l1lfia7fm9g7bsvaoseph.apps.googleusercontent.com';
        $login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode($redirecturi) . '&response_type=code&client_id=' . $clid . '&access_type=online';
        
        return redirect($login_url);

    }


    public function getCode(Request $request) { 

        $CLIENT_ID = '368283194415-q30kj2ef7r6l1lfia7fm9g7bsvaoseph.apps.googleusercontent.com';
        $CLIENT_SECRET='0je2mAHGJ90apljiGYYMxBBQ';
         //echo $request->get('code');die;   
         if($request->get('code')) {
            try {
              
                $data = $this->GetAccessToken($CLIENT_ID, url('admin/getcode'), $CLIENT_SECRET, $request->get('code'));

                $GoogleToken = array('GoogleAccessToken'=>$data['access_token'],'GoogleAccessTokenExpireTime'=>time() + 3500);

                $GoogleAccessToken = $data['access_token'];
                //print_r($GoogleAccessToken);die;
              
                session(['GoogleAccessToken' => $GoogleAccessToken]);
                session(['GoogleAccessTokenExpireTime' => $GoogleToken['GoogleAccessTokenExpireTime'] ]);

                //$value = session('GoogleAccessToken');
               
                return redirect('admin/surveyrequest');
            }
            catch(Exception $e) {
                echo $e->getMessage();
                exit();
            }
        }
    }

    public function addSchedule() { 

        return view('backend.survey.create');
    }


    public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {  
        $url = 'https://accounts.google.com/o/oauth2/token';            
        
        $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);    
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);      
        if($http_code != 200) 
            return array();
            // throw new Exception('Error : Failed to receieve access token');

        return $data;
    }


    public function CreateCalendarEvent($calendar_id, $curlPost, $access_token) {
        $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events';

        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_events);     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_POST, 1);      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));   
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);      
        if($http_code != 200) 
            return array();
            // throw new Exception('Error : Failed to create event');

        //print_r($data);die;
        return $data;
    }


    public function UpdateCalendarEvent($calendar_id, $curlPost, $access_token,$event_id) {
        $url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events/'.$event_id;

        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_events);     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));   
        $data = json_decode(curl_exec($ch), true);
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);      
        if($http_code != 200) 
            return array();
            // throw new Exception('Error : Failed to create event');

        return $data;
    }

    public function GetUserCalendarTimezone($access_token) {
        $url_settings = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';
        
        $ch = curl_init();      
        curl_setopt($ch, CURLOPT_URL, $url_settings);       
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));   
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        $data = json_decode(curl_exec($ch), true); 
        // echo '<pre>';print_r($data);echo '</pre>';
        $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);      
        if($http_code != 200) 
            return array();
            // throw new Exception('Error : Failed to get timezone');

        return $data['value'];
    }



    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
    */
    public function viewSurvey(Request $request)
    {   
        if (date('m') <= 06) {
            $financial_year = (date('Y')-1) . '-' . date('Y');
        } else {
        	if (date('d') <= 24) {
            	$financial_year = (date('Y')-1) . '-' . date('Y');
         	} else {
            	$financial_year = date('Y') . '-' . (date('Y') + 1);
         	}
        }

        $yrs = explode('-',$financial_year);
        $start_yr = "$yrs[0]-06-25";
        $end_yr = "$yrs[1]-06-24";

           $resident_id = '';
       $default_dropdown = DB::table('survey_lists')
                       ->leftJoin('users as doctor', 'doctor.id', '=', 'survey_lists.user_id')
                       ->leftJoin('users as resident', 'resident.id', '=', 'survey_lists.requestby')
                       ->select('survey_lists.*','doctor.first_name as doctor_first_name','doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name','doctor.active','survey_lists.requestby as resident_id');
       if(Auth::user()->hasRole("ROLE_ADMIN")){
             
       }else{
            $user = Auth::user();
            $default_dropdown = $default_dropdown->where('resident.hospital_id',$user->hospital_id);
       }
        $default_dropdown =  $default_dropdown->orderBy('resident.first_name', 'asc')
                       ->groupBy('survey_lists.requestby')
                       ->get()->toArray();   

        $survey_lists = DB::table('survey_lists')
                       ->leftJoin('users as doctor', 'doctor.id', '=', 'survey_lists.user_id')
                       ->leftJoin('users as resident', 'resident.id', '=', 'survey_lists.requestby')
                       ->leftJoin('survey_email_template', 'survey_email_template.survey_name', '=', 'survey_lists.survey_title')
                       ->select('survey_lists.*','doctor.first_name as doctor_first_name','doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name','doctor.active','survey_lists.requestby as resident_id','survey_email_template.survey_type_id as sur_ty_id');

        // $sur_ty = DB::table('survey_lists')
        //           ->join('survey_email_template', 'survey_email_template.survey_name', '=', 'survey_lists.survey_title');

                  // dd($survey_lists->survey_type_id);

        if($request->survey_name != null || $request->daterange != null){

            if($request->survey_name != null && $request->daterange != "" && $request->daterange != null){

            $daterange = $request->daterange;
            $dates = explode(' - ', $daterange);
            $start_date = date($dates[0]);
            $end_date = date($dates[1]);
            $resident_id = $request->survey_name;

            if(Auth::user()->hasRole("ROLE_ADMIN")){
                 if ($start_date && $end_date) {
                    if ($start_date == $end_date) {
                        $survey_lists = $survey_lists->where('survey_lists.created_at' ,'LIKE', '%' .$start_date.'%');
                    } else {
                        $survey_lists = $survey_lists->whereBetween('survey_lists.created_at',[$start_date,$end_date]);      
                    }
                    
                }
                if ($resident_id) {
                    $survey_lists = $survey_lists->where('survey_lists.requestby',$resident_id);
                }
                // $survey_lists = $survey_lists->whereBetween('survey_lists.created_at',[$start_date,$end_date])->where('survey_lists.requestby',$resident_id);
// dd($start_date,$end_date,$resident_id);
            }else{
                $user = Auth::user();
                $survey_lists = $survey_lists
                                ->where('resident.hospital_id',$user->hospital_id)
                                ->whereBetween('survey_lists.created_at',[$start_date,$end_date])
                                ->where('requestby',$resident_id);
            }
         }elseif($request->survey_name != null && $request->survey_name != ""){
            $resident_id = $request->survey_name;
            if(Auth::user()->hasRole("ROLE_ADMIN")){
                $survey_lists = $survey_lists->where('requestby',$resident_id);
            }else{
                $survey_lists = $survey_lists->where('requestby',$resident_id)->where('resident.hospital_id',$user->hospital_id);

            }
         }elseif($request->daterange != null && $request->daterange != "" ){
            $daterange = $request->daterange;
            $dates = explode(' - ', $daterange);
            $start_date = date($dates[0]);
            $end_date = date($dates[1]);
            if(Auth::user()->hasRole("ROLE_ADMIN")){

                if($start_date == $end_date){
                    $survey_lists = $survey_lists->where('survey_lists.created_at' ,'LIKE', '%' .$start_date.'%');
                }else{
                    $survey_lists = $survey_lists->whereBetween('survey_lists.created_at',[$start_date,$end_date]);
                }
               
            }else{

                 if($start_date == $end_date){
                    $survey_lists = $survey_lists->where('survey_lists.created_at' ,'LIKE', '%' .$start_date.'%')->where('resident.hospital_id',$user->hospital_id);
                }else{
                    $survey_lists = $survey_lists->whereBetween('survey_lists.created_at',[$start_date,$end_date])->where('resident.hospital_id',$user->hospital_id);
                }

               
                
            }
        }

        }else{
            if(Auth::user()->hasRole("ROLE_ADMIN")){

            }else{
                $user = Auth::user();
                $survey_lists = $survey_lists->where('resident.hospital_id',$user->hospital_id);
                
            }

        }

        $survey_lists = $survey_lists->orderBy('survey_lists.created_at', 'desc')
                                     ->whereBetween('survey_lists.created_at',[$start_yr,$end_yr])
                                     ->get()->toArray();

        $daterange = $request->daterange;   
            // dd($survey_lists);
        return view('backend.doctorsurvey.index', compact('survey_lists','default_dropdown','resident_id','daterange'));
    }

    public function filViewSurvey(Request $request)
    {   
        $survey_lists = [];
        $rangeYr = $request->created_at;      
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";

        $default_dropdown = DB::table('survey_lists')
                       ->leftJoin('users as doctor', 'doctor.id', '=', 'survey_lists.user_id')
                       ->leftJoin('users as resident', 'resident.id', '=', 'survey_lists.requestby')
                       ->leftJoin('survey_email_template', 'survey_email_template.survey_name', '=', 'survey_lists.survey_title')
                       ->select('survey_lists.*','doctor.first_name as doctor_first_name','doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name','doctor.active','survey_lists.requestby as resident_id','survey_email_template.survey_type_id as sur_ty_id');
                       if($start_date && $end_date){
                        $default_dropdown = $default_dropdown->whereBetween('survey_lists.created_at',[$start_date,$end_date]);
                    }
                    $default_dropdown = $default_dropdown->orderBy('survey_lists.created_at', 'desc')
                    ->get()->toArray();   

        $survey_lists = DB::table('survey_lists')
                       ->leftJoin('users as doctor', 'doctor.id', '=', 'survey_lists.user_id')
                       ->leftJoin('users as resident', 'resident.id', '=', 'survey_lists.requestby')
                       ->leftJoin('survey_email_template', 'survey_email_template.survey_name', '=', 'survey_lists.survey_title')
                       ->select('survey_lists.*','doctor.first_name as doctor_first_name','doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name','doctor.active','survey_lists.requestby as resident_id','survey_email_template.survey_type_id as sur_ty_id');

        return compact('survey_lists','default_dropdown');
    }


   

    //display email template with questions and answers


        public function survey_template()
    {       
       
        $surveys = DB::table('answers')
           
            ->leftJoin('questions', 'questions.id', '=', 'answers.question_id')
            ->leftJoin('survey_email_template', 'survey_email_template.id', '=', 'answers.survey_template_id')           
            ->select('answers.*','survey_email_template.email_template_name','questions.question_title','survey_email_template.id as email_temp_id')
            ->where('answers.survey_template_id','1')
            ->orderBy('survey_lists.created_at', 'desc')
            ->get()->toArray();
      
        return view('backend.survey.test', compact('surveys'));
    }

    public static function quickRandom($length = 10)
    {
        $unique =   FALSE;
        while (!$unique) {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $uniquToken = substr(str_shuffle(str_repeat($pool, $length)), 0, $length);

            $check_code_exist = SurveyList::where('urlcode', $uniquToken)->select('id')->first();
            if (!$check_code_exist) {
                $unique = TRUE;
            }
        }

        return $uniquToken;
    }

   public function surveyStore(Request $request)
    { 
        //print_r($request->all());exit;
       if($request->survey_type == 1)
       {
        $request->validate([
            'survey_type'=>'required',
            'survey_name'=>'required',
            // 'doctor_list'=>'required',
            'resident_list'=>'required',
           
        ]);
        }else{

             $request->validate([
            'survey_type'=>'required',
            'survey_name'=>'required',
            'doctor_list'=>'required',
            'resident_list'=>'required',
           
        ]);

        }
        $survey_title =  $surveys = DB::table('survey_email_template')
                          ->where('id',$request->survey_name)
                          ->first();

        $survey_name = $survey_title->survey_name;
       
        $uniquToken = $this->quickRandom();
        $url_code_url = URL::to('/') . "/surveypreview/" . $uniquToken;

        $QRcodeurl = $url_code_url;
        $input = $request->all();
        $qrimg = time() . $input['survey_name'] . '.png';

        \QrCode::backgroundColor(255, 255, 0)
            ->format('png')->size(300)
            ->generate($QRcodeurl, public_path('QRcode/' . $qrimg));

            // Send link via text using Twillio

        // $user_id_twillio = $request->get('doctor_list');
        // $user_id_sms = $request->get('resident_list');
        // $user_twillio = DB::table('users')
        //                   ->where('id',$user_id_twillio)
        //                   ->first();
        // $user_name_sms = DB::table('users')
        //                   ->where('id',$user_id_sms)
        //                   ->first();
        // $user_mobilenumber_twillio = $user_twillio->mobilenumber;

        // if($request->survey_type == 4 && $user_mobilenumber_twillio && $request->send_sms == 1){

        //     $message = "Please fill out an evaluation for $user_name_sms->first_name $user_name_sms->last_name at the following link: $QRcodeurl - Regards ConnectTHAT";

        //     try {
        //         Twilio::message($user_mobilenumber_twillio, $message);
        //     } catch (\Exception $e) {
        //         return back()->withError($e->getMessage());
        //     }
        // }
                         

            $survey = new SurveyList;
            $survey->survey_id = $request->get('survey_name');
            $survey->survey_title = $survey_name;
            //echo $survey->survey_id;exit;
            $survey->preview_url = $QRcodeurl;
            $survey->survey_qrcode = $qrimg;
            $survey->urlcode = $uniquToken;
            if($request->survey_type == 1){
            $survey->user_id = $request->get('resident_list');
            }else{
            $survey->user_id =$request->get('doctor_list');   
            }
            
            $survey->requestby =$request->get('resident_list');
            $survey->scheduled ='0';
            $survey->submitted = '0';
            $survey->is_manual = '1';
            $survey->created_at = Carbon::now();
            $survey_id = $survey->save();
            $insert_id = $survey->id;


      return redirect('admin/viewsurvey');


    }


    public function surveyCreate()
    { 
       
    $survey_types = DB::table('survey_type')
                    ->select('*')
                    ->get()->toArray();
                  
    return view('backend.doctorsurvey.create', compact('survey_types'));

    }

    public function filSurveyCreate(Request $request)
    { 
        $survey_types = [];
        $rangeYr = $request->created_at;     
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";
       
    $survey_types = DB::table('survey_type')
                    ->select('*')
                    ->get()->toArray();
                  
    return $survey_types;

    }

    public function surveyList(Request $request)
    { 
        if (date('m') <= 06) {
            $financial_year = (date('Y')-1) . '-' . date('Y');
        } else {
        	if (date('d') <= 24) {
            	$financial_year = (date('Y')-1) . '-' . date('Y');
         	} else {
            	$financial_year = date('Y') . '-' . (date('Y') + 1);
         	}
        }

        $yrs = explode('-',$financial_year);
        $start_yr = "$yrs[0]-06-25";
        $end_yr = "$yrs[1]-06-24";
        
         $surveys = DB::table('survey_email_template')->orderBy('survey_email_template.created_at', 'desc')
                                     ->whereBetween('survey_email_template.created_at',[$start_yr,$end_yr])
                    // ->select('*')
                    ->get()->toArray();
            return view('backend.surveycreate.index', compact('surveys'));
    }

    public function filSurList(Request $request){ 

        $surveys = [];
        $rangeYr = $request->created_at;      
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";

        $surveys = DB::table('survey_email_template')
                    ->select('*');
                    if($start_date && $end_date){
                        $surveys = $surveys->whereBetween('survey_email_template.created_at',[$start_date,$end_date]);
                    }
                    $surveys = $surveys->orderBy('survey_email_template.created_at', 'desc')
                    ->get()->toArray();
                          
            return $surveys ;
    }

    public function surveyEdit($id)
    {
        
        $survey = SurveyEmailTemplate::where('id',$id)->first();
        return view('backend.surveycreate.edit', compact('survey'));
   
    }

    public function surveyUpdate(Request $request, $id)
    {

        $request->validate([
            'survey_name'=>'required',
            ]);

        $survey = SurveyEmailTemplate::find($id);
        $survey->survey_name =  $request->get('survey_name');
        $survey->save();

        return redirect('admin/surveylist')->with('success', 'Survey updated successfully!');
    }

     public function destroySurvey($id)
    { 
        $survey = SurveyEmailTemplate::find($id);
        $survey->delete();
        DB::table('surveys')->where('id', $id)->delete();
        return redirect('admin/surveylist')->with('success', 'Survey deleted!');
    }

    public function addsurvey(Request $request)
    { 
      $survey_types= SurveyType::all()->toArray();
      return view('backend.surveycreate.create', compact('survey_types'));
                               
    }

    public function submitSurvey(Request $request)
    { 
            
        $request->validate([
            'survey_name'=>'required',
            'survey_type'=>'required',
                                          
        ]);
            $survey = new SurveyEmailTemplate;
            $survey->survey_name = $request->get('survey_name');
            $survey->survey_type_id= $request->get('survey_type');
            $survey_id = $survey->save();
            $insert_id = $survey->id;

            return redirect('admin/surveylist')->with('success', 'Survey submitted successfully!');

    }

        public function addDoctor(Request $request){
        
        if(Auth::user()->hasRole("ROLE_ADMIN"))
        {
        $survey_id = $request['id'];
        $doctor_list = DB::table('users')
        ->select('users.id','users.first_name','users.last_name','doctor_survey.survey_id')
        ->leftJoin('doctor_survey','doctor_survey.doctor_id','=','users.id')
        ->where('survey_id' ,'=',$survey_id)
        ->where('users.active','=',1)
        ->get()->toArray();

        }
        else
        {

        $survey_id = $request['id'];
        $user = Auth::user();
        $doctor_list =    DB::table('users')
        ->select('users.id','users.first_name','users.last_name','doctor_survey.survey_id')
        ->leftJoin('doctor_survey','doctor_survey.doctor_id','=','users.id')
        ->where('survey_id' ,'=',$survey_id)
        ->where('hospital_id' ,$user->hospital_id)
        ->where('users.active','=',1)
        ->get()->toArray();

        }
      
        echo json_encode(array('status'=>true,'data'=>$doctor_list));

        }

    public function addResident(Request $request){

        $doctor_id = $request['id'];
        $resident_list = DB::table('users')
        ->select('users.id','users.first_name','users.last_name','users.hospital_id')
        ->where('users.active','=',1)
        ->Join('role_user','role_user.user_id','=','users.id')
        ->whereIn('users.hospital_id',function($query) use($doctor_id){
        $query->select('hospital_id')->from('users')->where('id',$doctor_id);
        })
        ->where('role_user.role_id','=',2)
        ->orderBy('users.first_name', 'asc')
        // ->toSql();
         ->get()->toArray();
                                 
        echo json_encode(array('status'=>true,'data'=>$resident_list));
        }


     public function addSurveyName(Request $request){


        if(!empty($request['doctor_id'])){
            $doctor_id = $request['doctor_id'];    
        }elseif(!empty($request['survey_temp_id'])){
            $survey_temp_id = $request['survey_temp_id'];
        }else{$survey_type_id = $request['id'];
        }

        if(Auth::user()->hasRole("ROLE_ADMIN"))
        {
        
        $query = DB::table('users')
        ->where('users.active','=',1)
        ->select('users.id','users.first_name','users.last_name')
        ->leftJoin('role_user','role_user.user_id','=','users.id')
        ->where('role_user.role_id' ,2);
        if(!empty($doctor_id)){
             $query->where('users.id' ,'<>',$doctor_id);
        }
        $query->orderBy('users.first_name', 'asc');
        $self_resident_list = $query->get()->toArray();

     }else{

        $user = Auth::user();
        $query = DB::table('users')
        ->where('users.active','=',1)
        ->select('users.id','users.first_name','users.last_name')
        ->leftJoin('role_user','role_user.user_id','=','users.id')
        ->where('role_user.role_id' ,2)
        ->where('hospital_id' ,$user->hospital_id);
        if(!empty($doctor_id)){
             $query->where(['users.id' =>$doctor_id],['hospital_id' =>$user->hospital_id]);
            
        }
       $query->orderBy('users.first_name', 'asc');
        $self_resident_list = $query->get()->toArray();

     }

        
        if(!empty($survey_type_id)){

            if (date('m') <= 6) {//Upto June 2014-2015
                $financial_year = (date('Y')-1) . '-' . date('Y');
                $start_date = (date('Y')-1).'-06-25';
                $end_date = date('Y').'-06-24';
            } else {//After June 2015-2016
                $financial_year = date('Y') . '-' . (date('Y') + 1);
                $start_date = date('Y').'-06-25';
                $end_date = (date('Y')+1).'-06-24';   
            }
            // dd($start_date,$end_date);


                $survey_type = DB::table('survey_email_template')
                ->select('survey_email_template.*')
                ->Join('survey_type','survey_type.id','=','survey_email_template.survey_type_id')
                ->where('survey_email_template.survey_type_id', '=', $survey_type_id)
                ->whereBetween('survey_email_template.created_at',[$start_date,$end_date])
                ->get()->toArray();

                $response_type['survey_type'] = $survey_type;
               
         }
          $response_type['self_resident_list'] = $self_resident_list;
        

        //Resident of Attending(doctor list)
         
        if(!empty($survey_temp_id)){
        if(Auth::user()->hasRole("ROLE_ADMIN")){
        $doctor_list = DB::table('users')
        // ->where('users.active','=',1)
        ->select('users.id','users.first_name','users.last_name','doctor_survey.survey_id')
        ->leftJoin('doctor_survey','doctor_survey.doctor_id','=','users.id')
        ->where('survey_id' ,'=',$survey_temp_id)
        ->orderBy('users.first_name', 'asc')
        ->get()->toArray();
        }
        else{


        $user = Auth::user();
        $doctor_list = DB::table('users')
        // ->where('users.active','=',1)
        ->select('users.id','users.first_name','users.last_name','doctor_survey.survey_id')
        ->leftJoin('doctor_survey','doctor_survey.doctor_id','=','users.id')
        ->where('survey_id' ,'=',$survey_temp_id)
        ->where('hospital_id' ,$user->hospital_id)
        ->orderBy('users.first_name', 'asc')
        // ->toSql();
        ->get()->toArray();

        }
       
       $response_type['doctor_list'] = $doctor_list;
        }
          
                
       echo json_encode(array('status'=>true,'data'=>$response_type));

    }

  

    public function addResOfResident(Request $request){
        $survey_type_id = $request['id'];
        $resident_resident_list = DB::table('users')
        ->where('users.active','=',1)
        ->select('users.id','users.first_name','users.last_name')
        ->leftJoin('role_user','role_user.user_id','=','users.id')
        ->where('role_user.role_id' ,'=',2)
        ->get()->toArray();
 
    echo json_encode(array('status'=>true,'data'=>$resident_resident_list));

    }


   

   
}
