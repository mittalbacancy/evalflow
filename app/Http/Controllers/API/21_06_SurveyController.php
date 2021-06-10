<?php

namespace App\Http\Controllers\API;

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


    public function json_change_key($arr, $oldkey, $newkey) {
        $json = str_replace('"'.$oldkey.'":', '"'.$newkey.'":', $arr);
        return $json;  
    }

    
    /** 
     * surveyRequest api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function surveyRequest(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'survey_id' => 'required',       
            'user_id' => 'required',             
        ]);
           if ($validator->fails()) { 
                // /return response()->json(['error'=>$validator->errors()], 401);
                $error = json_decode($validator->errors());                
                return response()->json(['message'=>"Please fill required parameter",'status'=>401,'data'=>array()], 200);            
            }
            $input = $request->all();             
            

           $url = "https://api.surveymonkey.net/v3/surveys/". $input['survey_id'];

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
            $QRcodeurl = $response['preview'];
            $qrimg = time().$input['survey_id'].'.png';

            //print_r($qrimg);die;

            \QrCode::backgroundColor(255, 255, 0)
                ->format('png')->size(300)
                ->generate($QRcodeurl, public_path('QRcode/'.$qrimg));

            $input['preview_url'] = $QRcodeurl;
            $input['survey_qrcode'] = $qrimg;
            $input['requestby'] = Auth::user()->id;
            
            $surveyList = SurveyList::create($input);     

             $surveyList['survey_qrcode'] = url('/QRcode/'.$qrimg);

        } 
             
        return response()->json(['data' => $surveyList,'message' => 'Survey Request submitted successfully','status'=>$this-> successStatus],$this-> successStatus ); 

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
           

            return response()->json(['data' => $response,'message' => '','status'=>$this->successStatus],$this-> successStatus ); 
        } 
    }

         /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function surveyHistory() 
    { 
        //$surveyHistory = SurveyList::all();   

        $surveyHistory = DB::table('survey_lists')
            ->join('users', 'users.id', '=', 'survey_lists.user_id') 
            ->where('requestby',Auth::user()->id)
            ->select('survey_lists.*', 'users.email','users.first_name','users.last_name','users.image')
            ->get()->toArray();

        $i=0;
        foreach ($surveyHistory as $surveyHis) {
            //print_r($surveyHis);die;
            if($surveyHis->image){
                $surveyHistory[$i]->image = Storage::url('avatars/'.$surveyHis->image);
            }else{
                $surveyHistory[$i]->image = Storage::url('avatars/default_user.png');
            }
            $surveyHistory[$i]->survey_qrcode = url('/QRcode/'.$surveyHis->survey_qrcode);

            $i++;
        }
        //print_r($surveyHistory);die;
        return response()->json(['data' => $surveyHistory,'message' => '','status'=>$this->successStatus],$this-> successStatus );
        
    } 

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
            ->select('users.*','doctor_survey.id as dsurveyid','doctor_survey.survey_id')
            ->where('doctor_survey.survey_id',$id)
            ->get()->toArray();
        //print_r($user);die;

        return response()->json(['data' => $doctor,'message' => '','status'=>$this->successStatus],$this-> successStatus ); 
        
    } 

    /** 
     * surveyList api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function surveyList(Request $request) 
    {   
        $response = Survey::all();        

        return response()->json(['data' => $response,'message' => '','status'=>$this->successStatus],$this-> successStatus ); 
        
    } 



}