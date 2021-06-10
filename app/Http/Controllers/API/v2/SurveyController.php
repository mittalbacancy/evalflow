<?php

namespace App\Http\Controllers\API\v2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\SurveyList;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Model\Survey;
//use App\Model\SurveyTrackList;
use Illuminate\Support\Facades\URL;
use App\Model\SurveyEmailTemplate;
use App\Model\SurveyType;

class SurveyController extends Controller
{
    public $successStatus = 200;

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    // public function surveyList() 
    // { 
    //     $user = User::where('active',1)->whereHas('roles', function ($query) {
    //         $query->where('name', '=', 'ROLE_DOCTOR');
    //     })->get()->toArray();

    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => "https://api.surveymonkey.net/v3/surveys?page=1&per_page=50",
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => "",
    //         CURLOPT_TIMEOUT => 30000,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => "GET",
    //         CURLOPT_HTTPHEADER => array(
    //             // Set Here Your Requesred Headers
    //             'Content-Type: application/json',
    //             'Authorization: bearer tQv4E6NxvDsCX2w8LhZp1bVTZXpfgQ17KS5jbd4h0tqvb0ySbOMi4YSXc0AdaZuoFxFDxIb7A12oojiRMuOYyG9QBJCXb7EX7Fa.nshi8JRzZ75B-WhfLpIqSemIDlTY',
    //         ),
    //     ));
    //     $response = curl_exec($curl);
    //     $err = curl_error($curl);
    //     curl_close($curl);

    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {

    //         $response = $this->json_change_key($response,'data','surveylist');

    //         $response =  (array) json_decode($response);

    //         $response['personlist'] = $user;          

    //         return response()->json(['data' => $response,'message' => '','status'=>$this->successStatus],$this-> successStatus ); 
    //     }       

    // } 


    public function json_change_key($arr, $oldkey, $newkey)
    {
        $json = str_replace('"' . $oldkey . '":', '"' . $newkey . '":', $arr);
        return $json;
    }

    /* Random unique code */
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

    /** 
     * surveyRequest api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function surveyRequest(Request $request)
    {
       if($request->survey_type_id == 1){
        $validator = Validator::make($request->all(), [
            'survey_type_id' => 'required',
            'survey_id' => 'required',
            'survey_title' => 'required',
            'resident_id' => 'required',
           
        ]);
    }else{

        $validator = Validator::make($request->all(), [
            'survey_type_id' => 'required',
            'survey_id' => 'required',
            'survey_title' => 'required',
            'resident_id' => 'required',
            'doctor_id' => 'required'
        ]);

    }
        if ($validator->fails()) {
            // /return response()->json(['error'=>$validator->errors()], 401);
            $error = json_decode($validator->errors());
            return response()->json(['message' => "Please fill required parameter", 'status' => 401, 'data' => array()], 200);
        }
        $input = $request->all();

        $uniquToken = $this->quickRandom();
        $url_code_url = URL::to('/') . "/surveypreview/" . $uniquToken;


        $QRcodeurl = $url_code_url;
        $qrimg = time() . $input['survey_id'] . '.png';

        \QrCode::backgroundColor(255, 255, 0)
            ->format('png')->size(300)
            ->generate($QRcodeurl, public_path('QRcode/' . $qrimg));

        $input['preview_url'] = $QRcodeurl;
        $input['survey_qrcode'] = $qrimg;
        $input['urlcode'] = $uniquToken;

        if($request->survey_type_id == 1){
             $input['user_id'] = $request->resident_id;//'0';
        }
        else{
            $input['user_id'] = $request->doctor_id;
        }
       
        $input['requestby'] = $request->resident_id;

        $survey_type = DB::table('survey_email_template')
                            ->select('*')
                            ->where('survey_email_template.id', '=', $input['survey_id'])
                            ->first();
                   
        $survey_type_id = $survey_type->survey_type_id;
        $surveyList = SurveyList::create($input);
        $surveyList['survey_qrcode'] = url('/QRcode/' . $qrimg);
        $surveyList['survey_type_id'] = $survey_type_id;

        return response()->json(['data' => $surveyList, 'message' => 'Survey Request submitted successfully', 'status' => $this->successStatus], $this->successStatus);
    }


    /** 
     * surveyRequest api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function surveyUrl(Request $request)
    {
        $url = "https://api.surveymonkey.net/v3/surveys/174825238";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
                'Authorization: bearer tQv4E6NxvDsCX2w8LhZp1bVTZXpfgQ17KS5jbd4h0tqvb0ySbOMi4YSXc0AdaZuoFxFDxIb7A12oojiRMuOYyG9QBJCXb7EX7Fa.nshi8JRzZ75B-WhfLpIqSemIDlTY',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            //$response = $this->json_change_key($response,'data','surveylist');

            $response =  (array) json_decode($response);
            //print_r($response['preview']);die;

            $QRcodeurl = $response['preview'];


            return response()->json(['data' => $response, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
        }
    }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function surveyHistory()
    {

        $surveyHistory = DB::table('survey_lists')
            ->leftJoin('users', 'users.id', '=', 'survey_lists.user_id')
            ->leftJoin('survey_email_template', 'survey_email_template.id', '=', 'survey_lists.survey_id')
            ->where('requestby', Auth::user()->id)
            ->orWhere('user_id', Auth::user()->id)
            ->where('survey_lists.is_deleted',0)
            ->whereIn('survey_email_template.survey_type_id', [1, 4])
            ->select('survey_lists.*', 'users.email', 'users.first_name', 'users.last_name', 'users.image', 'users.qualification')
            ->get()->toArray();
    
        $i = 0;
        foreach ($surveyHistory as $surveyHis) {
      
            if ($surveyHis->image) {
                $surveyHistory[$i]->image = Storage::url('avatars/' . $surveyHis->image);
            } else {
                $surveyHistory[$i]->image = Storage::url('avatars/default_user.png');
            }
            $surveyHistory[$i]->survey_qrcode = url('/QRcode/' . $surveyHis->survey_qrcode);

            $i++;
        }
  
        return response()->json(['data' => $surveyHistory, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
    }

    /****** phase 2 Survey History********/

    //     public function surveyTrackHistory()
    // {
    //     //$surveyHistory = SurveyList::all();   

    //     $surveyHistory = DB::table('survey_track_list')
    //         ->join('users', 'users.id', '=', 'survey_track_list.user_id')
    //         ->where('requestby', Auth::user()->id)
    //         ->select('survey_track_list.*', 'users.email', 'users.first_name', 'users.last_name', 'users.image', 'users.qualification')
    //         ->get()->toArray();
         
    //     $i = 0;
    //     foreach ($surveyHistory as $surveyHis) {
         
    //         if ($surveyHis->image) {
    //             $surveyHistory[$i]->image = Storage::url('avatars/' . $surveyHis->image);
    //         } else {
    //             $surveyHistory[$i]->image = Storage::url('avatars/default_user.png');
    //         }
    //         $surveyHistory[$i]->survey_qrcode = url('/QRcode/' . $surveyHis->survey_qrcode);

    //         $i++;
    //     }
      
    //     return response()->json(['data' => $surveyHistory, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
    // }

    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function getDoctorList(Request $request)
    {

        $input = $request->all();
        $id = $input['survey_id'];

        $doctor = DB::table('users')
            ->join('doctor_survey', 'users.id', '=', 'doctor_survey.doctor_id')
            ->select('users.*', 'doctor_survey.id as dsurveyid', 'doctor_survey.survey_id')
            ->where('doctor_survey.survey_id', $id)
            ->where('users.active','=',1)
            ->get()->toArray();

        return response()->json(['data' => $doctor, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
    }



    /** 
     * surveyList api 
     * 
     * @return \Illuminate\Http\Response 
     */
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
        
        $response = SurveyEmailTemplate::whereBetween('created_at',[$start_yr,$end_yr])->get();
        if(!empty($response)){
            foreach ($response as $key =>&$value) {
              $value['surv_id'] = $value['id'];
            }
       }

        return response()->json(['data' => $response, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
    }


    public function surveyType(Request $request)
    {
        $response = DB::table('survey_type')->select('id','survey_type')
            ->get()->toArray();
        return response()->json(['data' => $response, 'message' => '', 'status' => $this->successStatus], $this->successStatus);
    }

    public function resiSelfRequest(Request $request)
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

        $input = $request->all();
        $id = $input['survey_type_id'];
        $data = array();
      
        $survey_template = DB::table('survey_email_template')
            ->select('id','survey_name')
            ->whereBetween('created_at',[$start_yr,$end_yr])
            ->where('survey_type_id', $id)
            ->get()->toArray();
       
        $data['survey_title'] = $survey_template;
        $user_firstname = auth()->user()->first_name;
        $user_lastname = auth()->user()->last_name;
        $user_id = auth()->user()->id;

        $user_name = $user_firstname." ".$user_lastname;
        $data['single_resident_id'] = $user_id;
        $data['single_resident_name'] = $user_name;
        

        return response()->json(['self_evaluation' => $data, 'message' => 'get data successfully', 'status' => $this->successStatus], $this->successStatus);
    }


    public function resiResidentRequest(Request $request)
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

        $input = $request->all();
        $id = $input['survey_type_id'];
        $data = array();
      
        $survey_template = DB::table('survey_email_template')
            ->select('id','survey_name')
            ->whereBetween('created_at',[$start_yr,$end_yr])
            ->where('survey_type_id', $id)
            ->get()->toArray();
        $data['survey_title'] = $survey_template;

        $resident_name = DB::table('users')
        ->select('users.id','users.first_name','users.last_name')
        ->leftJoin('role_user','role_user.user_id','=','users.id')
        ->where('role_user.role_id' ,'=',2)
        ->where('users.active','=',1)
        ->orderBy('users.first_name', 'asc')
        ->get()->toArray();
        $data['resident_list'] = array();
        foreach ($resident_name as $resident_name_list) {
       

        $resi_firstname = $resident_name_list->first_name;
        $resi_lastname = $resident_name_list->last_name;
        $resi_id = $resident_name_list->id;
        $resident_name_list = $resi_firstname." ".$resi_lastname;
        $arr['id']=$resi_id;
        $arr['residentname']=$resident_name_list;

        array_push($data['resident_list'], $arr);
  
             
        }

       
        $user_firstname = auth()->user()->first_name;
        $user_lastname = auth()->user()->last_name;
        $user_id = auth()->user()->id;
       
        $user_name = $user_firstname." ".$user_lastname;

        $data['single_resident_id'] = $user_id;
        $data['single_resident_name'] = $user_name;
     

        return response()->json(['Resi_resident_data' => $data, 'message' => 'get data successfully', 'status' => $this->successStatus], $this->successStatus);
    }


    public function resiDoctorRequest(Request $request)
    {

        $input = $request->all();
        $id = $input['survey_id'];
        
        $data['doctor_list'] = array();

        $doctor_name_list = DB::table('users')
        ->select('users.id','users.first_name','users.last_name','doctor_survey.survey_id')
        ->leftJoin('doctor_survey','doctor_survey.doctor_id','=','users.id')
        ->where('survey_id' ,'=',$id)
        ->where('users.active','=',1)
        ->orderBy('users.first_name', 'asc')
        ->get()->toArray();

       foreach ($doctor_name_list as $doctor_name) {
       
        $doc_id = $doctor_name->id;
        $doc_firstname = $doctor_name->first_name;
        $doc_lastname = $doctor_name->last_name;

        $doctor_list = $doc_firstname." ".$doc_lastname;
        $arr['id']=$doc_id;
        $arr['residentname']=$doctor_list;

        array_push($data['doctor_list'], $arr);

         
        }
    
     return response()->json(['Resi_doctor_data' => $data, 'message' => 'get doctor list successfully', 'status' => $this->successStatus], $this->successStatus);
    }

    public function docResidentRequest(Request $request)
    {

        $input = $request->all();
        $doctor_id = $input['doctor_id'];
        
        $data['resident_list'] = array();

        $resident_name_list = DB::table('users')
        ->select('users.id','users.first_name','users.last_name','users.hospital_id')
        ->Join('role_user','role_user.user_id','=','users.id')
        ->whereIn('users.hospital_id',function($query) use($doctor_id){
        $query->select('hospital_id')->from('users')->where('id',$doctor_id);
        })
        ->where('role_user.role_id','=',2)
        ->where('users.active','=',1)
        ->orderBy('users.first_name', 'asc')
        ->get()->toArray();

        $data['resident_list'] = array();
        foreach ($resident_name_list as $resident_name) {
        $resi_id = $resident_name->id;    
        $resi_firstname = $resident_name->first_name;
        $resi_lastname = $resident_name->last_name;
        $resident_list = $resi_firstname." ".$resi_lastname;
        $arr['id']=$resi_id;
        $arr['residentname']=$resident_list;

        array_push($data['resident_list'], $arr);
     
         
        }
    
     return response()->json(['Doc_resident_data' => $data, 'message' => 'get resident list successfully', 'status' => $this->successStatus], $this->successStatus);
    }


}
