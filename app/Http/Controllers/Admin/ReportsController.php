<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Auth;
use Carbon\Carbon;
use PDF;
use App;
use App\Model\SurveyAnswer;

class ReportsController extends Controller
{
    public function showEvaluationReport(Request $request){

        $resident_id = $request->resident_id;
        $daterange = $request->daterange; 
        $user = DB::table('users')->where('id',$resident_id)->first();
        $default_dropdown = DB::table('survey_lists')
                       ->leftJoin('users as doctor', 'doctor.id', '=', 'survey_lists.user_id')
                       ->leftJoin('users as resident', 'resident.id', '=', 'survey_lists.requestby')
                       ->select('survey_lists.*','doctor.first_name as doctor_first_name','doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name','doctor.active','survey_lists.requestby as resident_id');

        if(Auth::user()->hasRole("ROLE_ADMIN")){
             
        }else{
            $user = Auth::user();
            $default_dropdown = $default_dropdown->where('resident.hospital_id',$user->hospital_id);
        }

        $default_dropdown =  $default_dropdown
                       ->where('doctor.active',1)
                       ->where('resident.active',1)                       
                       ->groupBy('survey_lists.requestby')                       
                       ->orderBy('resident.first_name', 'asc')
                       ->get()->toArray(); 

        $survey_lists = DB::table('survey_lists')                       
                       ->leftjoin('users as doctor', 'survey_lists.user_id', '=', 'doctor.id')
                        ->leftJoin('users as resident', 'survey_lists.requestby', '=', 'resident.id')
                       /*->leftJoin('survey_email_template', 'survey_email_template.survey_name', '=', 'survey_lists.survey_title')*/
                       ->leftjoin('survey_email_template', 'survey_lists.survey_id', '=', 'survey_email_template.id')
                       ->leftjoin('survey_type', 'survey_email_template.survey_type_id', '=', 'survey_type.id')
                       ->select('survey_lists.*','survey_lists.requestby as resident_id','survey_email_template.survey_type_id as sur_ty_id','survey_type.survey_type','doctor.first_name as doctor_first_name', 'doctor.last_name as doctor_last_name','resident.first_name as resident_first_name', 'resident.last_name as resident_last_name');

        if(!empty($daterange)){
            
            $dates = explode(' - ', $daterange);
            $start_date = date($dates[0]);
            $end_date = date($dates[1]);            

            if ($start_date && $end_date) {
                if ($start_date == $end_date) {
                    $survey_lists = $survey_lists->where('survey_lists.created_at' ,'LIKE', '%' .$start_date.'%');
                } else {
                    $survey_lists = $survey_lists->whereBetween('survey_lists.created_at',[$start_date,$end_date]);      
                }                
            }                     
        }else{
            $start_date = getFinancialStartDate();
            $end_date   = getFinancialEndDate();
        }
        $survey_lists = $survey_lists->where('submitted',1);
        $survey_lists = $survey_lists->where('survey_lists.requestby',$resident_id);        
        $survey_lists = $survey_lists->orderBy('survey_lists.created_at', 'desc')
                                     //->whereBetween('survey_lists.created_at',[$start_yr,$end_yr])
                                     ->get()->toArray();
        $survey_track_id = array();
        foreach($survey_lists as $survey_list){
            array_push($survey_track_id,$survey_list->id);
        }

        $survey_answers = SurveyAnswer::whereIn('survey_track_id', $survey_track_id)->get();
        //dd($survey_answers);

        $daterange = $request->daterange;  
        $residents = DB::table('users')                    
                     ->leftJoin('role_user','users.id','=','role_user.user_id')
                     ->leftJoin('evaluation_calculation','users.id','=','evaluation_calculation.resident_id')
                     ->select('users.first_name','users.last_name','evaluation_calculation.*')
                     ->where('role_user.role_id','=' , 2)
                     ->where('evaluation_calculation.resident_id',$resident_id);
                                       
                     //->whereBetween('evaluation_calculation.created_at',[$start_date,$end_date])
                     
                    if ($start_date && $end_date) {
                        if ($start_date == $end_date) {
                            $residents = $residents->where('evaluation_calculation.created_at' ,'LIKE', '%' .$start_date.'%');
                        } else {
                            $residents = $residents->whereBetween('evaluation_calculation.created_at',[$start_date,$end_date]);
                        }                
                    } 
                    $residents = $residents->orderBy('evaluation_calculation.created_at', 'desc')->get()->toArray();
                     $avr_count = array();
                     $avr_count = getEvaluationCalculation($residents);

        return view('reports.evaluation',compact('default_dropdown','resident_id','daterange','survey_lists','avr_count','survey_answers','user'));
    }

    public function EvaluationReportPdf(Request $request){
        $data = array('residentName'=>$request->resident_name);
        return  view('pdf.reportEvaluation', compact('data'));               
    }
}
