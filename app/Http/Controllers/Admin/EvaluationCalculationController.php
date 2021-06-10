<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Model\EvaluationCalculation;
use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class EvaluationCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        
        //\DB::enableQueryLog();
        $residents = DB::table('users')
                    
                     ->leftJoin('role_user','users.id','=','role_user.user_id')
                     ->leftJoin('evaluation_calculation','users.id','=','evaluation_calculation.resident_id')
                     ->select('users.first_name','users.last_name','evaluation_calculation.*')
                     ->where('role_user.role_id','=' , 2)
                     ->orderBy('evaluation_calculation.created_at', 'desc')
                     ->whereBetween('evaluation_calculation.created_at',[$start_yr,$end_yr])
                     ->get()->toArray();
        //print_r(\DB::getQueryLog());
        // exit;

                     $avr_count = array();
        

                    foreach ($residents as $resident) {

                    $final_count = array();
                    $final_count['first_name'] = $resident->first_name;
                    $final_count['last_name'] = $resident->last_name;

                    $final_count['PC1'] = (($resident->PC1 > 0) && ($resident->count_PC1 > 0))  ? round(($resident->PC1)/$resident->count_PC1,2): $resident->PC1;
                    $final_count['PC2'] = (($resident->PC2 > 0) && ($resident->count_PC2 > 0))  ? round(($resident->PC2)/$resident->count_PC2,2): $resident->PC2;
                    $final_count['PC3'] = (($resident->PC3 > 0) && ($resident->count_PC3 > 0))  ? round(($resident->PC3)/$resident->count_PC3,2): $resident->PC3;
                    $final_count['PC4'] = (($resident->PC4 > 0) && ($resident->count_PC4 > 0))  ? round(($resident->PC4)/$resident->count_PC4,2): $resident->PC4;
                    $final_count['PC5'] = (($resident->PC5 > 0) && ($resident->count_PC5 > 0))  ? round(($resident->PC5)/$resident->count_PC5,2): $resident->PC5;
                    $final_count['MK1'] = (($resident->MK1 > 0) && ($resident->count_MK1 > 0))  ? round(($resident->MK1)/$resident->count_MK1,2): $resident->MK1;
                    $final_count['MK2'] = (($resident->MK2 > 0) && ($resident->count_MK2 > 0))  ? round(($resident->MK2)/$resident->count_MK2,2): $resident->MK2;
                    $final_count['MK3'] = (($resident->MK3 > 0) && ($resident->count_MK3 > 0))  ? round(($resident->MK3)/$resident->count_MK3,2): $resident->MK3;
                    $final_count['SBP1'] = (($resident->SBP1 > 0) && ($resident->count_SBP1 > 0))  ? round(($resident->SBP1)/$resident->count_SBP1,2): $resident->SBP1;
                    $final_count['SBP2'] = (($resident->SBP2 > 0) && ($resident->count_SBP2 > 0))  ? round(($resident->SBP2)/$resident->count_SBP2,2): $resident->SBP2;
                    $final_count['SBP3'] = (($resident->SBP3 > 0) && ($resident->count_SBP3 > 0))  ? round(($resident->SBP3)/$resident->count_SBP3,2): $resident->SBP3;
                    // $final_count['SBP4'] = (($resident->SBP4 > 0) && ($resident->count_SBP4 > 0))  ? round(($resident->SBP4)/$resident->count_SBP4,2): $resident->SBP4;
                    $final_count['PBLI1'] = (($resident->PBLI1 > 0) && ($resident->count_PBLI1 > 0))  ? round(($resident->PBLI1)/$resident->count_PBLI1,2): $resident->PBLI1;
                    $final_count['PBLI2'] = (($resident->PBLI2 > 0) && ($resident->count_PBLI2 > 0))  ? round(($resident->PBLI2)/$resident->count_PBLI2,2): $resident->PBLI2;
                    // $final_count['PBLI3'] = (($resident->PBLI3 > 0) && ($resident->count_PBLI3 > 0))  ? round(($resident->PBLI3)/$resident->count_PBLI3,2): $resident->PBLI3;
                    // $final_count['PBLI4'] = (($resident->PBLI4 > 0) && ($resident->count_PBLI4 > 0))  ? round(($resident->PBLI4)/$resident->count_PBLI4,2): $resident->PBLI4;
                    $final_count['PROF1'] = (($resident->PROF1 > 0) && ($resident->count_PROF1 > 0))  ? round(($resident->PROF1)/$resident->count_PROF1,2): $resident->PROF1;
                    $final_count['PROF2'] = (($resident->PROF2 > 0) && ($resident->count_PROF2 > 0))  ? round(($resident->PROF2)/$resident->count_PROF2,2): $resident->PROF2;
                    $final_count['PROF3'] = (($resident->PROF3 > 0) && ($resident->count_PROF3 > 0))  ? round(($resident->PROF3)/$resident->count_PROF3,2): $resident->PROF3;
                    $final_count['PROF4'] = (($resident->PROF4 > 0) && ($resident->count_PROF4 > 0))  ? round(($resident->PROF4)/$resident->count_PROF4,2): $resident->PROF4;
                    $final_count['ICS1'] = (($resident->ICS1 > 0) && ($resident->count_ICS1 > 0))  ? round(($resident->ICS1)/$resident->count_ICS1,2): $resident->ICS1;
                    $final_count['ICS2'] = (($resident->ICS2 > 0) && ($resident->count_ICS2 > 0))  ? round(($resident->ICS2)/$resident->count_ICS2,2): $resident->ICS2;
                    $final_count['ICS3'] = (($resident->ICS3 > 0) && ($resident->count_ICS3 > 0))  ? round(($resident->ICS3)/$resident->count_ICS3,2): $resident->ICS3;

                    array_push($avr_count, $final_count);
                         }
                        
                 
                    
         return view('backend.evaluationcalculation.index',compact('avr_count'));


    }

    public function filEvalCal(Request $request)
    {
        $residents = [];
        $rangeYr = $request->created_at;     
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";

        
        $residents = DB::table('users')
                    ->leftJoin('role_user','users.id','=','role_user.user_id')
                    ->leftJoin('evaluation_calculation','users.id','=','evaluation_calculation.resident_id')
                    ->select('users.first_name','users.last_name','evaluation_calculation.*')
                    ->where('role_user.role_id','=' , 2);
                    if($start_date && $end_date){
                        $residents = $residents->whereBetween('evaluation_calculation.created_at',[$start_date,$end_date]);
                    }
                        $residents = $residents->orderBy('evaluation_calculation.created_at', 'desc')
                    ->get()->toArray();

                     $avr_count = array();

                    foreach ($residents as $resident) {

                    $final_count = array();
                    $final_count['first_name'] = $resident->first_name;
                    $final_count['last_name'] = $resident->last_name;

                    $final_count['PC1'] = (($resident->PC1 > 0) && ($resident->count_PC1 > 0))  ? round(($resident->PC1)/$resident->count_PC1,2): $resident->PC1;
                    $final_count['PC2'] = (($resident->PC2 > 0) && ($resident->count_PC2 > 0))  ? round(($resident->PC2)/$resident->count_PC2,2): $resident->PC2;
                    $final_count['PC3'] = (($resident->PC3 > 0) && ($resident->count_PC3 > 0))  ? round(($resident->PC3)/$resident->count_PC3,2): $resident->PC3;
                    $final_count['PC4'] = (($resident->PC4 > 0) && ($resident->count_PC4 > 0))  ? round(($resident->PC4)/$resident->count_PC4,2): $resident->PC4;
                    $final_count['PC5'] = (($resident->PC5 > 0) && ($resident->count_PC5 > 0))  ? round(($resident->PC5)/$resident->count_PC5,2): $resident->PC5;
                    $final_count['MK1'] = (($resident->MK1 > 0) && ($resident->count_MK1 > 0))  ? round(($resident->MK1)/$resident->count_MK1,2): $resident->MK1;
                    $final_count['MK2'] = (($resident->MK2 > 0) && ($resident->count_MK2 > 0))  ? round(($resident->MK2)/$resident->count_MK2,2): $resident->MK2;
                    $final_count['MK3'] = (($resident->MK3 > 0) && ($resident->count_MK3 > 0))  ? round(($resident->MK3)/$resident->count_MK3,2): $resident->MK3;
                    $final_count['SBP1'] = (($resident->SBP1 > 0) && ($resident->count_SBP1 > 0))  ? round(($resident->SBP1)/$resident->count_SBP1,2): $resident->SBP1;
                    $final_count['SBP2'] = (($resident->SBP2 > 0) && ($resident->count_SBP2 > 0))  ? round(($resident->SBP2)/$resident->count_SBP2,2): $resident->SBP2;
                    $final_count['SBP3'] = (($resident->SBP3 > 0) && ($resident->count_SBP3 > 0))  ? round(($resident->SBP3)/$resident->count_SBP3,2): $resident->SBP3;
                    // $final_count['SBP4'] = (($resident->SBP4 > 0) && ($resident->count_SBP4 > 0))  ? round(($resident->SBP4)/$resident->count_SBP4,2): $resident->SBP4;
                    $final_count['PBLI1'] = (($resident->PBLI1 > 0) && ($resident->count_PBLI1 > 0))  ? round(($resident->PBLI1)/$resident->count_PBLI1,2): $resident->PBLI1;
                    $final_count['PBLI2'] = (($resident->PBLI2 > 0) && ($resident->count_PBLI2 > 0))  ? round(($resident->PBLI2)/$resident->count_PBLI2,2): $resident->PBLI2;
                    // $final_count['PBLI3'] = (($resident->PBLI3 > 0) && ($resident->count_PBLI3 > 0))  ? round(($resident->PBLI3)/$resident->count_PBLI3,2): $resident->PBLI3;
                    // $final_count['PBLI4'] = (($resident->PBLI4 > 0) && ($resident->count_PBLI4 > 0))  ? round(($resident->PBLI4)/$resident->count_PBLI4,2): $resident->PBLI4;
                    $final_count['PROF1'] = (($resident->PROF1 > 0) && ($resident->count_PROF1 > 0))  ? round(($resident->PROF1)/$resident->count_PROF1,2): $resident->PROF1;
                    $final_count['PROF2'] = (($resident->PROF2 > 0) && ($resident->count_PROF2 > 0))  ? round(($resident->PROF2)/$resident->count_PROF2,2): $resident->PROF2;
                    $final_count['PROF3'] = (($resident->PROF3 > 0) && ($resident->count_PROF3 > 0))  ? round(($resident->PROF3)/$resident->count_PROF3,2): $resident->PROF3;
                    $final_count['PROF4'] = (($resident->PROF4 > 0) && ($resident->count_PROF4 > 0))  ? round(($resident->PROF4)/$resident->count_PROF4,2): $resident->PROF4;
                    $final_count['ICS1'] = (($resident->ICS1 > 0) && ($resident->count_ICS1 > 0))  ? round(($resident->ICS1)/$resident->count_ICS1,2): $resident->ICS1;
                    $final_count['ICS2'] = (($resident->ICS2 > 0) && ($resident->count_ICS2 > 0))  ? round(($resident->ICS2)/$resident->count_ICS2,2): $resident->ICS2;
                    $final_count['ICS3'] = (($resident->ICS3 > 0) && ($resident->count_ICS3 > 0))  ? round(($resident->ICS3)/$resident->count_ICS3,2): $resident->ICS3;

                    array_push($avr_count, $final_count);
                         }
                        
                 
                    
         return compact('avr_count','residents');


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
