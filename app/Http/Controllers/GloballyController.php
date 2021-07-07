<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Model\SurveyTrackList;
use App\Model\SurveyList;
use App\Model\EvaluationCalculation;
use Illuminate\Support\Facades\DB;
use App\Model\SurveyAnswer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Log;

class GloballyController extends Controller
{
    public function surveyPreview($urlcode = "")
    {
        $survey_track = SurveyList::where('urlcode', $urlcode)->select("*")->first();
        if (!empty($survey_track)) {
            $survey_template_id = $survey_track->survey_id;

            $surveys = DB::table('answers')
                ->leftJoin('questions', 'questions.id', '=', 'answers.question_id')
                ->leftJoin('survey_email_template', 'survey_email_template.id', '=', 'answers.survey_template_id')
                ->select('answers.*', 'survey_email_template.survey_name', 'questions.question_title', 'survey_email_template.id as email_temp_id')
                ->where('answers.survey_template_id', $survey_template_id)
                ->orderBy('sortOrder', 'ASC')
                ->get()->toArray();

            $questions_ids = json_encode(array_column($surveys, 'question_id'));

            $survey_answer = SurveyAnswer::where('survey_track_id', $survey_track->id)->select("*")->get()->toArray();
           
            foreach ($surveys as $key => &$value) {
                $que = $value->question_id;

                $code1 = $value->code1;
                $code1_decode = json_decode($code1);
                $code2 = $value->code2;
                $code2_decode = json_decode($code2);
                $code3 = $value->code3;
                $code3_decode = json_decode($code3);
                $code4 = $value->code4;
                $code4_decode = json_decode($code4);

                //for Code1 
                if(!empty($code1_decode)){
                    $code_foramt = "";
                foreach($code1_decode as $key => $val) {
                    $temp = array();
                    $temp = "(".$key . ' -' . $val .")";
                    $code_foramt .= $temp.", ";
                    }
                    $value->codeformat1 = rtrim($code_foramt,', ');
                }

                //for code2
                if(!empty($code2_decode)){
                    $code_foramt = "";
                foreach($code2_decode as $key => $val) {
                    $temp = array();
                    $temp = "(".$key . ' -' . $val .")";
                    $code_foramt .= $temp.", ";
                    }
                    $value->codeformat2 = rtrim($code_foramt,', ');
                }

                //for code3
                if(!empty($code3_decode)){
                    $code_foramt = "";
                foreach($code3_decode as $key => $val) {
                    $temp = array();
                    $temp = "(".$key . ' -' . $val .")";
                    $code_foramt .= $temp.", ";
                    }
                    $value->codeformat3 = rtrim($code_foramt,', ');
                }

                //for code4
                if(!empty($code4_decode)){
                    $code_foramt = "";
                foreach($code4_decode as $key => $val) {
                    $temp = array();
                    $temp = "(".$key . ' -' . $val .")";
                    $code_foramt .= $temp.", ";
                    }
                    $value->codeformat4 = rtrim($code_foramt,', ');
                }

                $new = array_filter($survey_answer, function ($var) use ($que, $value) {
                    if ($var['question_id'] == $que) {
                        $value->final_answer = $var['answer_id'];
                        $value->final_question = $var['question_id'];
                    }
                });

            }
            $submit_name = "";
            $survey_type = "";
            //if($survey_track->submitted == 1){

                $submit_survey = DB::table('survey_lists')
                        ->leftjoin('users as doctor', 'survey_lists.user_id', '=', 'doctor.id')
                        ->leftJoin('users as resident', 'survey_lists.requestby', '=', 'resident.id')
                        ->leftjoin('survey_email_template', 'survey_lists.survey_id', '=', 'survey_email_template.id')
                        ->leftjoin('survey_type', 'survey_email_template.survey_type_id', '=', 'survey_type.id')
                        ->join('users', 'survey_lists.requestby', '=', 'users.id')
                        ->select('survey_lists.*', 'users.email', 'users.first_name', 'users.device_token', 'users.last_name', 'doctor.email as doctor_email', 'doctor.first_name as doctor_first_name', 'doctor.last_name as doctor_last_name','survey_type.*', 'resident.first_name as resident_first_name', 'resident.last_name as resident_last_name', 'survey_email_template.survey_type_id as sur_ty_id')
                        ->where('urlcode', $urlcode)
                        ->get()->toArray();

            $survey_type = $submit_survey[0]->survey_type;

            // $submit_name = $submit_survey[0]->first_name.' '.$submit_survey[0]->last_name;
            
            if($submit_survey[0]->sur_ty_id == 2 || $submit_survey[0]->sur_ty_id == 3){
                $submit_name = $submit_survey[0]->doctor_first_name.' '.$submit_survey[0]->doctor_last_name;
            }else {
                $submit_name = $submit_survey[0]->resident_first_name.' '.$submit_survey[0]->resident_last_name;   
            } 

             // dd($submit_survey[0]->doctor_first_name);


            //}
           
            return view('surveypreview', compact('surveys', 'urlcode', 'survey_track', 'questions_ids','submit_name','survey_type'));
        }
    }

    public function surveySubmit(Request $request)
    {
        
        $submit_name = "";
        $survey_q_n = $request->except(['_token', 'questions_ids']);
        $questions_ids = json_decode($request->questions_ids);
        foreach ($questions_ids as $key => $val) {
            $rules['option_' . $val] = 'required';
        }

        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
             //Log::channel('survey')->info('Validation Error=='.json_encode($validator));
            return Redirect::back()->withErrors($validator)->withInput($request->all());
        }
        
        $segment2 = $request->segment(2);
        if (empty($segment2)) {
            return abort(404);
        }

        $answer_type = $request->get('answer_type');
        //Log::channel('survey')->info("\n");
        //Log::channel('survey')->info('START surveySubmit---'.Carbon::now());
        $survey_track = DB::table('survey_lists')
                        ->leftjoin('users as doctor', 'survey_lists.user_id', '=', 'doctor.id')
                        ->join('users', 'survey_lists.requestby', '=', 'users.id')
                        ->select('survey_lists.*', 'users.email', 'users.first_name', 'users.device_token', 'users.last_name', 'doctor.email as doctor_email', 'doctor.first_name as doctor_first_name', 'doctor.last_name as doctor_last_name')
                        ->where('urlcode', $segment2)
                        ->get()->toArray();

        if (!empty($survey_track) && $survey_track[0]->submitted == '0') {
            
            //Log::channel('survey')->info('IF---168');

            $survey_answer = array();
            $tempCodes = array();
            //dump($request->all());
            //dump($survey_q_n);
            //dd();
            foreach ($survey_q_n as $survey_key => $survey_value) {
                $temp = array();
                //get questions id 
                $explodeQstn = explode('_', $survey_key);
                if(isset($explodeQstn[0]) && $explodeQstn[0] == 'answer'){continue;}
                $question = $explodeQstn[1];
                //get code id name as per selected option
                $explodeCode = explode('_', $survey_value);
                //dump($survey_value);
                // $code = "";
                $answer_type = $request->get('answer_type_'.$question);
                
                if(isset($explodeCode[1]) && $answer_type != 'dropdown' ){
                    $code = 'code'.$explodeCode[1];
                    $surveyID = $survey_track[0]->survey_id;
                    //get code id value as per selected option
                    $tempCodes[] = DB::table('answers')->where('survey_template_id',$surveyID)->where('question_id',$question)->pluck($code)->first();
                    $surveytypeidcheck = DB::table('answers')
                       // ->where('survey_template_id',$surveyID)
                       ->leftJoin('survey_email_template', 'survey_email_template.id', '=', 'answers.survey_template_id')
                       ->where('question_id',$question)
                       ->select('answers.*','survey_email_template.survey_type_id as sur_type_id')
                       ->first();
                }else if($answer_type == 'dropdown'){
                    $surveyID = $survey_track[0]->survey_id;
                    //get code id value as per selected option
                    $getData = DB::table('answers')->where('survey_template_id',$surveyID)->where('question_id',$question)->pluck('dd_code')->first();
                    $getData = json_decode($getData,true);
                    //dump($getData);
                    for ($i=0; $i < count($getData) ; $i++) { 
                        //dump($getData[$i]['option_'.($i+1)] ?? '');
                        if($explodeCode[1] == ($i+1)){
                            $tempCodes[] = json_encode($getData[$i]['option_'.$explodeCode[1]]);
                        }
                    }

                    //dump($getData[0]['option_1']);

                    
                    //dd($tempCodes);
                    
                    //$tempCodes[]= '1';
                    $surveytypeidcheck = DB::table('answers')
                       // ->where('survey_template_id',$surveyID)
                       ->leftJoin('survey_email_template', 'survey_email_template.id', '=', 'answers.survey_template_id')
                       ->where('question_id',$question)
                       ->select('answers.*','survey_email_template.survey_type_id as sur_type_id')
                       ->first();
                }

                
                //dd($tempCodes);
                // print_r($tempCodes);exit;
                $temp['survey_track_id'] = $survey_track[0]->id;
                $temp['survey_id'] = $survey_track[0]->survey_id;
                $temp['submitted_by'] = $survey_track[0]->user_id;
                list($question, $question_id) = explode('_', $survey_key);
                $temp['question_id'] = $question_id;
                $temp['answer_id'] = $survey_value;
                $temp['created_at'] = Carbon::now();
                $temp['updated_at'] = Carbon::now();
                //dd($temp);
                array_push($survey_answer, $temp);
            }

            if ($surveytypeidcheck->sur_type_id == 2) {
                //Log::channel('survey')->info('IF---209 -- surveytypeidcheck->sur_type_id == 2');
                /************ Send email to Resident and Admin ***********/
                $data['title'] = "Evaluation submitted by Dr." . '' . $survey_track[0]->doctor_first_name . ' ' . $survey_track[0]->doctor_last_name;
                $data['doctoremail'] = $survey_track[0]->doctor_email;
                $data['doctorname'] =  $survey_track[0]->doctor_last_name;
                $data['residentname'] =  $survey_track[0]->first_name;
                $data['survey_title'] =  $survey_track[0]->survey_title;
                $data['survey_url'] =  $survey_track[0]->preview_url;
                $user_email = 'shrutipatel@bacancytechnology.com';
                $subject = "Evaluation submitted by Dr." . '' . $survey_track[0]->doctor_first_name . ' ' . $survey_track[0]->doctor_last_name;
                //$user_email = $survey_track[0]->email;


                // Mail::send('survey_email_resident', $data, function ($message) use ($user_email,$subject) {
                //     $message->to($user_email, '')->subject($subject);
                //     $message->from(env('MAIL_USERNAME'), 'Admin');
                // });

                try{
                    Mail::send('survey_email_admin', $data, function ($message) use ($user_email,$subject) {
                        $message->to(env('MAIL_USERNAME'), '')->subject($subject);
                        $message->from(env('MAIL_USERNAME'), 'Admin');
                    });
                    /************ Send email to Resident and Admin **********/
                } catch(\Exception $e){

                }

                /************ Send push notification to Resident  ***********/

                $deviceToken = $survey_track[0]->device_token;
                if (!empty($deviceToken)) {
                    /*$string=  $data['survey_title']." submitted by Dr. ".$data['doctorname'];
                    $message = \PushNotification::Message($string, array(
                        'sound' => 'default',
                        'custom' => array('custom data' => array(
                            'we' => 'want', 'send to app'
                        ))
                    ));

                    try{
                        \PushNotification::app('appNameIOS')
                            ->to($deviceToken)
                            ->send($message);    
                    } catch(\Exception $e){
                        
                    }*/
                }

                /************ Send push notification to Resident  ***********/

                SurveyAnswer::insert($survey_answer);
                $updated_data = array('submitted' => '1');
                $update_submitted = SurveyList::where('urlcode', $segment2)->update($updated_data);
                return \Redirect::route('surveypreview', [$segment2])->with('message', 'Survey submitted successfully.');
            } else {
                 //Log::channel('survey')->info('else---265 -- surveytypeidcheck->sur_type_id != 2');      
                // decode codes values
                $newCode = array();
                foreach ($tempCodes as $key => $value) {
                   $newCode[] = json_decode($value,true);
                }
                
                // merge multiple codes in single array  (if duplicate key add and merge them)
                $mergedCode = array();
                $forCount = array();
                foreach ($newCode as $a) {
                    if(!empty($a)){
                       foreach ($a as $key => $value) { 
                            $forCount[] = $key;                     
                            $mergedCode[$key] = $value + ($mergedCode[$key] ?? 0);
                        } 
                    } 
                }
                //dd($mergedCode);
                $count_vals = array_count_values($forCount);
                     
                $resident_id = DB::table('survey_lists')->where('urlcode', $segment2)->pluck('requestby')->first();
                

                if (date('m') <= 06) {
                    $financial_year = (date('Y')-1) . '-' . date('Y');
                } else {
                    if (date('d') <= 24) {
                        $financial_year = (date('Y')-1) . '-' . date('Y');
                    } else {
                        $financial_year = date('Y') . '-' . (date('Y') + 1);
                    }
                }

                /*if (date('m') <= 06 && date('d') <= 24) {
                    $financial_year = (date('Y') - 1) . '-' . date('Y');
                    // echo($financial_year);
                } else {
                    $financial_year = date('Y') . '-' . (date('Y') + 1);
                    // echo($financial_year);   
                }*/
                
                //dd($financial_year);
                /*$yrs = explode('-',$financial_year);
                $start_yr = Carbon::parse("$yrs[0]-06-25")->format('Y-m-d');
                $end_yr = Carbon::parse("$yrs[1]-06-24")->format('Y-m-d');*/
                $start_yr = Carbon::parse(getFinancialStartDate())->format('Y-m-d');
                $end_yr   = Carbon::parse(getFinancialEndDate())->format('Y-m-d');
                
                //echo $start_yr."-".$end_yr;  
                //Log::channel('survey')->info('checking date range--->'.$start_yr."=======".$end_yr);
                //Log::channel('survey')->info('resident_id =='.$resident_id);
                //\DB::enableQueryLog();
                $find_resident_in_eval = EvaluationCalculation::where('resident_id', $resident_id)
                         //->whereBetween('created_at',[$start_yr,$end_yr])                           
                            ->where(function($q) use ($start_yr, $end_yr){
                                $q->whereBetween(\DB::raw('DATE(created_at)'), array($start_yr, $end_yr));
                            })                            
                           ->get();
                //select * from `evaluation_calculation` where `resident_id` = 135 and (DATE_FORMAT(created_at,'%Y-%m-%d') >= '2021-06-25' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '2022-06-24')
                //echo count($find_resident_in_eval);
                //echo "here";exit;
                //Log::channel('survey')->info('Query=='.json_encode(\DB::getQueryLog()));
                if(count($find_resident_in_eval) > 0){   

                    //Log::channel('survey')->info('find_resident_in_eval > 0');
                    //Log::channel('survey')->info('find_resident_in_eval id ==='.$find_resident_in_eval[0]['id']);

                    $PC1 = array_key_exists("PC1",$mergedCode) ? $mergedCode['PC1']+$find_resident_in_eval[0]['PC1'] : $find_resident_in_eval[0]['PC1'];
                    $PC2 = array_key_exists("PC2",$mergedCode) ? $mergedCode['PC2']+$find_resident_in_eval[0]['PC2'] : $find_resident_in_eval[0]['PC2'];
                    $PC3 = array_key_exists("PC3",$mergedCode) ? $mergedCode['PC3']+$find_resident_in_eval[0]['PC3'] : $find_resident_in_eval[0]['PC3'];
                    $PC4 = array_key_exists("PC4",$mergedCode) ? $mergedCode['PC4']+$find_resident_in_eval[0]['PC4'] : $find_resident_in_eval[0]['PC4'];
                    $PC5 = array_key_exists("PC5",$mergedCode) ? $mergedCode['PC5']+$find_resident_in_eval[0]['PC5'] : $find_resident_in_eval[0]['PC5'];
                    $MK1 = array_key_exists("MK1",$mergedCode) ? $mergedCode['MK1']+$find_resident_in_eval[0]['MK1'] : $find_resident_in_eval[0]['MK1'];
                    $MK2 = array_key_exists("MK2",$mergedCode) ? $mergedCode['MK2']+$find_resident_in_eval[0]['MK2'] : $find_resident_in_eval[0]['MK2'];
                    $MK3 = array_key_exists("MK3",$mergedCode) ? $mergedCode['MK3']+$find_resident_in_eval[0]['MK3'] : $find_resident_in_eval[0]['MK3'];
                    $SBP1 = array_key_exists("SBP1",$mergedCode) ? $mergedCode['SBP1']+$find_resident_in_eval[0]['SBP1'] : $find_resident_in_eval[0]['SBP1'];
                    $SBP2 = array_key_exists("SBP2",$mergedCode) ? $mergedCode['SBP2']+$find_resident_in_eval[0]['SBP2'] : $find_resident_in_eval[0]['SBP2'];
                    $SBP3 = array_key_exists("SBP3",$mergedCode) ? $mergedCode['SBP3']+$find_resident_in_eval[0]['SBP3'] : $find_resident_in_eval[0]['SBP3'];
                    $PBLI1 = array_key_exists("PBLI1",$mergedCode) ? $mergedCode['PBLI1']+$find_resident_in_eval[0]['PBLI1'] : $find_resident_in_eval[0]['PBLI1'];
                    $PBLI2 = array_key_exists("PBLI2",$mergedCode) ? $mergedCode['PBLI2']+$find_resident_in_eval[0]['PBLI2'] : $find_resident_in_eval[0]['PBLI2'];
                    $PROF1 = array_key_exists("PROF1",$mergedCode) ? $mergedCode['PROF1']+$find_resident_in_eval[0]['PROF1'] : $find_resident_in_eval[0]['PROF1'];
                    $PROF2 = array_key_exists("PROF2",$mergedCode) ? $mergedCode['PROF2']+$find_resident_in_eval[0]['PROF2'] : $find_resident_in_eval[0]['PROF2'];
                    $PROF3 = array_key_exists("PROF3",$mergedCode) ? $mergedCode['PROF3']+$find_resident_in_eval[0]['PROF3'] : $find_resident_in_eval[0]['PROF3'];
                    $PROF4 = array_key_exists("PROF4",$mergedCode) ? $mergedCode['PROF4']+$find_resident_in_eval[0]['PROF4'] : $find_resident_in_eval[0]['PROF4'];
                    $ICS1 = array_key_exists("ICS1",$mergedCode) ? $mergedCode['ICS1']+$find_resident_in_eval[0]['ICS1'] : $find_resident_in_eval[0]['ICS1'];
                    $ICS2 = array_key_exists("ICS2",$mergedCode) ? $mergedCode['ICS2']+$find_resident_in_eval[0]['ICS2'] : $find_resident_in_eval[0]['ICS2'];
                    $ICS3 = array_key_exists("ICS3",$mergedCode) ? $mergedCode['ICS3']+$find_resident_in_eval[0]['ICS3'] : $find_resident_in_eval[0]['ICS3'];

                    //update code count field

                    $count_PC1 = array_key_exists("PC1",$count_vals) ? $count_vals['PC1'] + $find_resident_in_eval[0]['count_PC1']: $find_resident_in_eval[0]['count_PC1'];
                    $count_PC2 = array_key_exists("PC2",$count_vals) ? $count_vals['PC2'] + $find_resident_in_eval[0]['count_PC2']: $find_resident_in_eval[0]['count_PC2'];
                    $count_PC3 = array_key_exists("PC3",$count_vals) ? $count_vals['PC3'] + $find_resident_in_eval[0]['count_PC3']: $find_resident_in_eval[0]['count_PC3'];
                    $count_PC4 = array_key_exists("PC4",$count_vals) ? $count_vals['PC4'] + $find_resident_in_eval[0]['count_PC4']: $find_resident_in_eval[0]['count_PC4'];
                    $count_PC5 = array_key_exists("PC5",$count_vals) ? $count_vals['PC5'] + $find_resident_in_eval[0]['count_PC5']: $find_resident_in_eval[0]['count_PC5'];
                    $count_MK1 = array_key_exists("MK1",$count_vals) ? $count_vals['MK1'] + $find_resident_in_eval[0]['count_MK1']: $find_resident_in_eval[0]['count_MK1'];
                    $count_MK2 = array_key_exists("MK2",$count_vals) ? $count_vals['MK2'] + $find_resident_in_eval[0]['count_MK2']: $find_resident_in_eval[0]['count_MK2'];
                    $count_MK3 = array_key_exists("MK3",$count_vals) ? $count_vals['MK3'] + $find_resident_in_eval[0]['count_MK3']: $find_resident_in_eval[0]['count_MK3'];
                    $count_SBP1 = array_key_exists("SBP1",$count_vals) ? $count_vals['SBP1'] + $find_resident_in_eval[0]['count_SBP1']: $find_resident_in_eval[0]['count_SBP1'];
                    $count_SBP2 = array_key_exists("SBP2",$count_vals) ? $count_vals['SBP2'] + $find_resident_in_eval[0]['count_SBP2']: $find_resident_in_eval[0]['count_SBP2'];
                    $count_SBP3 = array_key_exists("SBP3",$count_vals) ? $count_vals['SBP3'] + $find_resident_in_eval[0]['count_SBP3']: $find_resident_in_eval[0]['count_SBP3'];
                    $count_PBLI1 = array_key_exists("PBLI1",$count_vals) ? $count_vals['PBLI1'] + $find_resident_in_eval[0]['count_PBLI1']: $find_resident_in_eval[0]['count_PBLI1'];
                    $count_PBLI2 = array_key_exists("PBLI2",$count_vals) ? $count_vals['PBLI2'] + $find_resident_in_eval[0]['count_PBLI2']: $find_resident_in_eval[0]['count_PBLI2'];
                    $count_PROF1 = array_key_exists("PROF1",$count_vals) ? $count_vals['PROF1'] + $find_resident_in_eval[0]['count_PROF1']: $find_resident_in_eval[0]['count_PROF1'];
                    $count_PROF2 = array_key_exists("PROF2",$count_vals) ? $count_vals['PROF2'] + $find_resident_in_eval[0]['count_PROF2']: $find_resident_in_eval[0]['count_PROF2'];
                    $count_PROF3 = array_key_exists("PROF3",$count_vals) ? $count_vals['PROF3'] + $find_resident_in_eval[0]['count_PROF3']: $find_resident_in_eval[0]['count_PROF3'];
                    $count_PROF4 = array_key_exists("PROF4",$count_vals) ? $count_vals['PROF4'] + $find_resident_in_eval[0]['count_PROF4']: $find_resident_in_eval[0]['count_PROF4'];
                    $count_ICS1 = array_key_exists("ICS1",$count_vals) ? $count_vals['ICS1'] + $find_resident_in_eval[0]['count_ICS1']: $find_resident_in_eval[0]['count_ICS1'];
                    $count_ICS2 = array_key_exists("ICS2",$count_vals) ? $count_vals['ICS2'] + $find_resident_in_eval[0]['count_ICS2']: $find_resident_in_eval[0]['count_ICS2'];
                    $count_ICS3 = array_key_exists("ICS3",$count_vals) ? $count_vals['ICS3'] + $find_resident_in_eval[0]['count_ICS3']: $find_resident_in_eval[0]['count_ICS3'];

                    //echo $find_resident_in_eval[0]['id'];
                    //Log::channel('survey')->info('Executing update query::'.Carbon::now());
                    EvaluationCalculation::where('resident_id', $resident_id)->where('id', $find_resident_in_eval[0]['id'])->update(['PC1' => $PC1,'PC2' => $PC2,'PC3' => $PC3,'PC4' => $PC4,'PC5' => $PC5,'MK1' => $MK1,'MK2' => $MK2,'MK3' => $MK3,'SBP1' => $SBP1,'SBP2' => $SBP2,'SBP3' => $SBP3,'PBLI1' => $PBLI1,'PBLI2' => $PBLI2, 'PROF1' => $PROF1,'PROF2' => $PROF2,'PROF3' => $PROF3,'PROF4' => $PROF4,'ICS1' => $ICS1,'ICS2' => $ICS2,'ICS3' => $ICS3, 'count_PC1' => $count_PC1, 'count_PC2' => $count_PC2, 'count_PC3' => $count_PC3, 'count_PC4' => $count_PC4, 'count_PC5' => $count_PC5, 'count_MK1' => $count_MK1, 'count_MK2' => $count_MK2, 'count_MK3' => $count_MK3, 'count_SBP1' => $count_SBP1, 'count_SBP2' => $count_SBP2, 'count_SBP3' => $count_SBP3, 'count_PBLI1' => $count_PBLI1, 'count_PBLI2' => $count_PBLI2, 'count_PROF1' => $count_PROF1, 'count_PROF2' => $count_PROF2, 'count_PROF3' => $count_PROF3, 'count_PROF4' => $count_PROF4, 'count_ICS1' => $count_ICS1, 'count_ICS2' => $count_ICS2, 'count_ICS3' => $count_ICS3,'updated_at' => Carbon::now()]);
                }else{
                   //insert 
                    // echo "add";
                    // dd($mergedCode);
                    //Log::channel('survey')->info('else--new evaluation calculation entry');
                    //Log::channel('survey')->info('resident_id='.$resident_id);
                    $evaluation = new EvaluationCalculation([
                        'resident_id' => $resident_id,
                        'PC1' => array_key_exists("PC1",$mergedCode) ?  $mergedCode['PC1'] : 0 ,
                        'PC2' => array_key_exists("PC2",$mergedCode) ?  $mergedCode['PC2'] : 0,
                        'PC3' => array_key_exists("PC3",$mergedCode) ?  $mergedCode['PC3'] : 0,
                        'PC4' => array_key_exists("PC4",$mergedCode) ?  $mergedCode['PC4'] : 0,
                        'PC5' => array_key_exists("PC5",$mergedCode) ?  $mergedCode['PC5'] : 0,
                        'MK1' => array_key_exists("MK1",$mergedCode) ?  $mergedCode['MK1'] : 0,
                        'MK2' => array_key_exists("MK2",$mergedCode) ?  $mergedCode['MK2'] : 0,
                        'MK3' => array_key_exists("MK3",$mergedCode) ?  $mergedCode['MK3'] : 0,
                        'SBP1' => array_key_exists("SBP1",$mergedCode) ?  $mergedCode['SBP1'] : 0,
                        'SBP2' => array_key_exists("SBP2",$mergedCode) ?  $mergedCode['SBP2'] : 0,
                        'SBP3' => array_key_exists("SBP3",$mergedCode) ?  $mergedCode['SBP3'] : 0,
                        'PBLI1' => array_key_exists("PBLI1",$mergedCode) ?  $mergedCode['PBLI1'] : 0,
                        'PBLI2' => array_key_exists("PBLI2",$mergedCode) ?  $mergedCode['PBLI2'] : 0,
                        'PROF1' => array_key_exists("PROF1",$mergedCode) ?  $mergedCode['PROF1'] : 0,
                        'PROF2' => array_key_exists("PROF2",$mergedCode) ?  $mergedCode['PROF2'] : 0,
                        'PROF3' => array_key_exists("PROF3",$mergedCode) ?  $mergedCode['PROF3'] : 0,
                        'PROF4' => array_key_exists("PROF4",$mergedCode) ?  $mergedCode['PROF4'] : 0,
                        'ICS1' => array_key_exists("ICS1",$mergedCode) ?  $mergedCode['ICS1'] : 0,
                        'ICS2' => array_key_exists("ICS2",$mergedCode) ?  $mergedCode['ICS2'] : 0,
                        'ICS3' => array_key_exists("ICS3",$mergedCode) ?  $mergedCode['ICS3'] : 0,
                        
                        'count_PC1' => array_key_exists("PC1",$count_vals) ?  $count_vals['PC1'] : 0 ,
                        'count_PC2' => array_key_exists("PC2",$count_vals) ?  $count_vals['PC2'] : 0,
                        'count_PC3' => array_key_exists("PC3",$count_vals) ?  $count_vals['PC3'] : 0,
                        'count_PC4' => array_key_exists("PC4",$count_vals) ?  $count_vals['PC4'] : 0,
                        'count_PC5' => array_key_exists("PC5",$count_vals) ?  $count_vals['PC5'] : 0,
                        'count_MK1' => array_key_exists("MK1",$count_vals) ?  $count_vals['MK1'] : 0,
                        'count_MK2' => array_key_exists("MK2",$count_vals) ?  $count_vals['MK2'] : 0,
                        'count_MK3' => array_key_exists("MK3",$count_vals) ?  $count_vals['MK3'] : 0,
                        'count_SBP1' => array_key_exists("SBP1",$count_vals) ?  $count_vals['SBP1'] : 0,
                        'count_SBP2' => array_key_exists("SBP2",$count_vals) ?  $count_vals['SBP2'] : 0,
                        'count_SBP3' => array_key_exists("SBP3",$count_vals) ?  $count_vals['SBP3'] : 0,
                        'count_PBLI1' => array_key_exists("PBLI1",$count_vals) ?  $count_vals['PBLI1'] : 0,
                        'count_PBLI2' => array_key_exists("PBLI2",$count_vals) ?  $count_vals['PBLI2'] : 0,
                        'count_PROF1' => array_key_exists("PROF1",$count_vals) ?  $count_vals['PROF1'] : 0,
                        'count_PROF2' => array_key_exists("PROF2",$count_vals) ?  $count_vals['PROF2'] : 0,
                        'count_PROF3' => array_key_exists("PROF3",$count_vals) ?  $count_vals['PROF3'] : 0,
                        'count_PROF4' => array_key_exists("PROF4",$count_vals) ?  $count_vals['PROF4'] : 0,
                        'count_ICS1' => array_key_exists("ICS1",$count_vals) ?  $count_vals['ICS1'] : 0,
                        'count_ICS2' => array_key_exists("ICS2",$count_vals) ?  $count_vals['ICS2'] : 0,
                        'count_ICS3' => array_key_exists("ICS3",$count_vals) ?  $count_vals['ICS3'] : 0,
                        'created_at' => Carbon::now(),         
                        'updated_at' => Carbon::now(),
                        
                    ]);
                    $evaluation->save();
                }
          

                /************ Send email to Resident and Admin ***********/
                $data['title'] = "Evaluation submitted by Dr." . '' . $survey_track[0]->doctor_first_name . ' ' . $survey_track[0]->doctor_last_name;
                $data['doctoremail'] = $survey_track[0]->doctor_email;
                $data['doctorname'] =  $survey_track[0]->doctor_last_name;
                $data['residentname'] =  $survey_track[0]->first_name;
                $data['survey_title'] =  $survey_track[0]->survey_title;
                $data['survey_url'] =  $survey_track[0]->preview_url;
                $user_email = 'shrutipatel@bacancytechnology.com';
                $subject = "Evaluation submitted by Dr." . '' . $survey_track[0]->doctor_first_name . ' ' . $survey_track[0]->doctor_last_name;
                $user_email = $survey_track[0]->email;

                if ($surveytypeidcheck->sur_type_id == 4){ 

                    Mail::send('survey_email_resident', $data, function ($message) use ($user_email,$subject) {
                        $message->to($user_email, '')->subject($subject);
                        //$message->from('connectthatapp@gmail.com', 'Admin');
                        $message->from(env('MAIL_USERNAME'), 'Admin');
                        
                    });
                }

                try{
                    Mail::send('survey_email_admin', $data, function ($message) use ($user_email,$subject) {
                        $message->to(env('MAIL_USERNAME'), '')->subject($subject);
                        $message->from(env('MAIL_USERNAME'), 'Admin');
                    });
                    
                } catch(\Exception $e){

                }
                /************ Send email to Resident and Admin **********/
                
                /************ Send push notification to Resident  ***********/

                $deviceToken = $survey_track[0]->device_token;
                if (!empty($deviceToken)) {
                    /*$string=  $data['survey_title']." submitted by Dr. ".$data['doctorname'];
                    $message = \PushNotification::Message($string, array(
                        'sound' => 'default',
                        'custom' => array('custom data' => array(
                            'we' => 'want', 'send to app'
                        ))
                    ));

                    try{
                        \PushNotification::app('appNameIOS')
                            ->to($deviceToken)
                            ->send($message);    
                    } catch(\Exception $e){
                        
                    }*/
                }

                /************ Send push notification to Resident  ***********/
                //dd($survey_answer);
                SurveyAnswer::insert($survey_answer);
                $updated_data = array('submitted' => '1');
                $update_submitted = SurveyList::where('urlcode', $segment2)->update($updated_data);
                //Log::channel('survey')->info('End OF process=='.Carbon::now()."\n");

                return \Redirect::route('surveypreview', [$segment2])->with('message', 'Survey submitted successfully.');
            }
        } else {
            return \Redirect::route('surveypreview', [$segment2])->with('message', 'You can preview your survey.');
        }
    }
}