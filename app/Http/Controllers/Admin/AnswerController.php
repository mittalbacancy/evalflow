<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Answers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Model\SurveyEmailTemplate;
use App\Model\Questions;
use App\Model\MileStoneCode;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = DB::table('answers')
                     ->select('answers.*','questions.*','questions.id as qid','answers.id as aid')
                     ->leftJoin('questions','questions.id','=','answers.question_id')
                     ->orderBy('answers.created_at', 'desc')
                     ->get()->toArray();
                                        
      
        return view('backend.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $surveys= SurveyEmailTemplate::all()->toArray();
        $milestone_code= MileStoneCode::all()->toArray();

        return view('backend.answers.create', compact('surveys','milestone_code'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());exit;
                      
         $request->validate([
            'survey_name'=>'required',
            'question_name'=>'required',
            'answer_type' => 'required',
            
        ]);
      
        $survey_value1 = $request->get('survey_value1');
        $survey_value2 = $request->get('survey_value2');
        $survey_value3 = $request->get('survey_value3');
        $survey_value4 = $request->get('survey_value4');

        
        $survey_value1 = json_encode((array_filter($survey_value1)));
        $survey_value2 = json_encode((array_filter($survey_value2)));
        $survey_value3 = json_encode((array_filter($survey_value3)));
        $survey_value4 = json_encode((array_filter($survey_value4)));
        
        $answers = new Answers([
            'survey_template_id' => $request->get('survey_name'),
            'question_id' => $request->get('question_name'),
            'answer_type' => $request->get('answer_type'),
            'option_1' => $request->get('option1'),
            'option_2' => $request->get('option2'),
            'option_3' => $request->get('option3'),
            'option_4' => $request->get('option4'),
            'code1' => $survey_value1,
            'code2' => $survey_value2,
            'code3' => $survey_value3,
            'code4' => $survey_value4,                      
        ]);

        $question_id = $request->get('question_name');
        $survey_template_id = $request->get('survey_name');
        $check_count = Answers::where('question_id',$question_id)->where('survey_template_id',$survey_template_id)->count();
        
        if($check_count == 0)
        {
           $answers->save();
        }
        else{
            return \Redirect::back()->withInput()->withErrors(['Answer already exists']);
            }
        
        
        return redirect('admin/answers')->with('success', 'Answers added successfully!');
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

        $surveys= SurveyEmailTemplate::all()->toArray();
        $email_template_id = answers::find($id);

        $milestone_code= MileStoneCode::all()->toArray();

        $answers = Answers::select('id','question_id','survey_template_id','answer_type','option_1','option_2','option_3','option_4','code1','code2','code3','code4')
                           ->where('id', '=', $id)
                           ->first();
        $questions= Questions::where('email_template_id',$answers->survey_template_id)->where('active','1')->get()->toArray();

        $answers->code1 = json_decode($answers['code1']);
        $answers->code2 = json_decode($answers['code2']);
        $answers->code3 = json_decode($answers['code3']);
        $answers->code4 = json_decode($answers['code4']);

        $code1_key =(array)$answers['code1'];
        $code2_key =(array)$answers['code2'];
        $code3_key =(array)$answers['code3'];
        $code4_key =(array)$answers['code4'];

        return view('backend.answers.edit', compact('answers','surveys','questions','email_template_id','milestone_code','code1_key','code2_key', 'code3_key', 'code4_key'));
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

        // echo "<pre>";
        //  print_r($request->all());exit;
        $request->validate([
            'survey_name'=>'required',
            'question_name'=>'required',
            'answer_type'=>'required'
            ]);

        $answers = Answers::find($id);

        $answers->survey_template_id =  $request->get('survey_name');
        $answers->question_id =  $request->get('question_name');
        $answers->answer_type = $request->get('answer_type');
       
        if($answers->answer_type == "radio")
        {

        $survey_value1 = $request->get('survey_value1');
        $survey_value2 = $request->get('survey_value2');
        $survey_value3 = $request->get('survey_value3');
        $survey_value4 = $request->get('survey_value4');

        $survey_value1 = json_encode((array_filter($survey_value1)));
        $survey_value2 = json_encode((array_filter($survey_value2)));
        $survey_value3 = json_encode((array_filter($survey_value3)));
        $survey_value4 = json_encode((array_filter($survey_value4)));

        $answers->option_1 = $request->get('option_1');
        $answers->option_2 = $request->get('option_2');
        $answers->option_3 = $request->get('option_3');
        $answers->option_4 = $request->get('option_4');
        $answers->code1 = $survey_value1;
        $answers->code2 = $survey_value2;
        $answers->code3 = $survey_value3;
        $answers->code4 = $survey_value4; 
         
        }
        else
        {
        $answers->option_1 = "";
        $answers->option_2 = "";
        $answers->option_3 = "";
        $answers->option_4 = "";
        $answers->code1 = "";
        $answers->code2 = "";
        $answers->code3 = "";
        $answers->code4 = "";  
        }

        $answers->save();

        return redirect('admin/questions')->with('success', 'Updated successfully!');
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

    public function addQuestion(Request $request){
        
       
        $survey_id = $request['id'];
        $question_list =  DB::table('questions')
        ->select('questions.*','questions.id as question_id','survey_email_template.id')
        ->leftJoin('survey_email_template','survey_email_template.id','=','questions.email_template_id')
        ->where('email_template_id' ,'=',$survey_id)
        ->where('questions.active','=', '1')
        ->get()->toArray();
            
        echo json_encode(array('status'=>true,'data'=>$question_list));

        }
}
