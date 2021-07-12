<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Role;
use App\Model\SurveyList;
use App\Model\ShiftSchedule;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;

class ScheduleController extends Controller
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
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $start_yr = getFinancialStartDate();
        $end_yr   = getFinancialEndDate();
        $schedule = ShiftSchedule::whereBetween('created_at',[$start_yr,$end_yr])->get();

        return view('backend.schedule.index', compact('schedule'));
    }

    public function filShiftSche(Request $request)
    {   
        $schedule = [];
        $rangeYr = $request->created_at;      
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-07-01";
        $end_date = "$yrs[1]-06-30";    
        
        $schedule = DB::table('shift_schedules')
                    ->select('*');
                    if($start_date && $end_date){
                        $schedule = $schedule->whereBetween('shift_schedules.created_at',[$start_date,$end_date]);
                    }
                    $schedule = $schedule->orderBy('shift_schedules.created_at', 'desc')
                    ->get()->toArray();

        return $schedule;
    }

    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendarview()
    {       
       
        $schedule = ShiftSchedule::all();

        return view('backend.schedule.calendar', compact('schedule'));
    }

   
}
