<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Questions;
use Illuminate\Support\Facades\DB;
use App\Model\SurveyEmailTemplate;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Model\MileStoneCode;
use App\Model\Answers;

class QuestionController extends Controller
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

        $questions = DB::table('questions')
                     ->select('questions.*','questions.id as question_id','survey_email_template.*')
                     ->leftJoin('survey_email_template','survey_email_template.id','=','questions.email_template_id')
                     ->orderBy('questions.created_at', 'desc')
                     ->whereBetween('questions.created_at',[$start_yr,$end_yr])
                     ->get()->toArray();
        $answers = DB::table('answers')
                     ->select('answers.*','questions.*','questions.id as qid','answers.id as aid')
                     ->leftJoin('questions','questions.id','=','answers.question_id')
                     ->orderBy('answers.created_at', 'desc')
                     ->whereBetween('answers.created_at',[$start_yr,$end_yr])
                     ->get()->toArray();
      
        return view('backend.questions.index', compact('questions','answers'));
    }

    public function filQue(Request $request){
        $surveys = [];
        $rangeYr = $request->created_at;      
        $yrs = explode('-',$rangeYr);
        $start_date = "$yrs[0]-06-25";
        $end_date = "$yrs[1]-06-24";

        $questions = DB::table('questions')
                    ->select('questions.*','questions.id as question_id','survey_email_template.*')
                    ->leftJoin('survey_email_template','survey_email_template.id','=','questions.email_template_id');
                    if($start_date && $end_date){
                        $questions = $questions->whereBetween('questions.created_at',[$start_date,$end_date]);
                    }
                    $questions = $questions->orderBy('questions.created_at', 'desc')
                     ->get()->toArray();
        $answers = DB::table('answers')
                     ->select('answers.*','questions.*','questions.id as qid','answers.id as aid')
                     ->leftJoin('questions','questions.id','=','answers.question_id');
                     if($start_date && $end_date){
                        $answers = $answers->whereBetween('answers.created_at',[$start_date,$end_date]);
                    }
                    $answers = $answers->orderBy('answers.created_at', 'desc')
                     ->get()->toArray();

                     $dataa['questions'] = $questions;
                     $dataa['answers'] = $answers;
      
        // dd($dataa);
        return $answers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $questions = Questions::all()->toArray(); 
        $surveys= SurveyEmailTemplate::all()->toArray();
        $milestone_code= MileStoneCode::all()->toArray();

        
            // echo "<pre>";
            // print_r($main_arr);
        
        return view('backend.questions.create', compact('questions','surveys','milestone_code','main_arr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'survey_name'=>'required',
            'question_name'=>'required',
            'answer_type' => 'required',
            ]);
               
        $question = [
            'email_template_id' => $request->get('survey_name'),
            'question_title' => $request->get('question_name'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),            
        ];
        $insertQue = Questions::create($question);
      
        $survey_value1 = $request->get('survey_value1');
        $survey_value2 = $request->get('survey_value2');
        $survey_value3 = $request->get('survey_value3');
        $survey_value4 = $request->get('survey_value4');

        $survey_value1 = json_encode((array_filter($survey_value1)));
        $survey_value2 = json_encode((array_filter($survey_value2)));
        $survey_value3 = json_encode((array_filter($survey_value3)));
        $survey_value4 = json_encode((array_filter($survey_value4)));
        
        $answers =[
            'survey_template_id' => $request->get('survey_name'),
            'question_id' => $insertQue->id,
            'answer_type' => $request->get('answer_type'),
            'option_1' => $request->get('option1'),
            'option_2' => $request->get('option2'),
            'option_3' => $request->get('option3'),
            'option_4' => $request->get('option4'),
            'code1' => $survey_value1,
            'code2' => $survey_value2,
            'code3' => $survey_value3,
            'code4' => $survey_value4,                      
        ];
        $insertAns = Answers::create($answers);

        $question_id = $insertQue->id;
        $survey_template_id = $request->get('survey_name');
        $check_count = Answers::where('question_id',$question_id)->where('survey_template_id',$survey_template_id)->count();
               
        return redirect('admin/questions')->with('success', 'Added successfully !');
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
        // $questions = Questions::select('*')->where('id',$id)->get()->toArray();
        $questions = DB::table('questions')
                     ->select('questions.*','questions.id as question_id','survey_email_template.*')
                     ->leftJoin('survey_email_template','survey_email_template.id','=','questions.email_template_id')
                    // ->where('questions.id',$id)
                     ->get()->toArray();
        $email_template_id = questions::find($id);
        $surveys = DB::table('survey_email_template')->get()->toArray();
            
        return view('backend.questions.edit', compact('questions','email_template_id','surveys')); 
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
       
        $request->validate([
            'survey_name'=>'required',
            'question_name'=>'required',
            ]);

        $questions = Questions::find($id);
        $questions->email_template_id =  $request->get('survey_name');
        $questions->question_title =  $request->get('question_name');
        $questions->active = $request->get('active');
        $questions->save();

        return redirect('admin/questions')->with('success', 'Question updated successfully!');
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
