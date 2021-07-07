<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if (\Auth::check()) {
        return redirect('admin/users');
    } else {
        return view('welcome');
    }
    
});

Route::get('/home', function () {
    return view('home');
});

//Auth::routes();
Auth::routes(['verify' => true]);

/* Admin route */


Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['role:ROLE_ADMIN']], function () {

    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

    Route::resource('admin', 'AdminController');
    Route::resource('users', 'UserController');
    Route::resource('doctors', 'DoctorController');
    Route::resource('hospitals', 'HospitalController');
    Route::resource('emailtemplates', 'EmailController');
    Route::resource('questions', 'QuestionController');
    Route::resource('answers', 'AnswerController');
    Route::resource('evaluationcalculation', 'EvaluationCalculationController');

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('profile', 'UserController@updateProfile');
    Route::any('surveycreate', 'SurveyController@surveyCreate')->name('surveycreate');
   
    Route::post('surveystore', 'SurveyController@surveyStore')->name('surveystore');
    Route::post('add_doctor', 'SurveyController@addDoctor')->name('add_doctor');
    Route::post('add_resident', 'SurveyController@addResident')->name('add_resident');
    Route::post("add_survey_name", "SurveyController@addSurveyName")->name('add_survey_name');
    Route::post("add_self_resident", "SurveyController@addSelfResident")->name('add_self_resident');
    Route::post("add_resident_resident", "SurveyController@addResOfResident")->name('add_resident_resident');
    //survey routes
    Route::any('surveylist', 'SurveyController@surveyList')->name('surveylist');
    Route::any('addsurvey', 'SurveyController@addSurvey')->name('addsurvey');
    Route::any('surveyedit/{id}', 'SurveyController@surveyEdit')->name('surveyedit');
    Route::any('surveyupdate/{id}', 'SurveyController@surveyUpdate')->name('surveyupdate');
    Route::any('destroysurvey/{id}', 'SurveyController@destroySurvey')->name('destroysurvey');
    Route::any('destroysurveylist/{id}', 'SurveyController@destroySurveyList')->name('destroysurveylist');

    // Year Filter Routes
    Route::get("filSurv", "SurveyController@filSurv")->name("filSurv");
    Route::get("filQue", "QuestionController@filQue")->name("filQue");
    Route::get('filSurList', 'SurveyController@filSurList')->name('filSurList');
    Route::get("filViewSurvey", "SurveyController@filViewSurvey")->name("filViewSurvey");
    Route::get("filShiftSche", "ScheduleController@filShiftSche")->name("filShiftSche");
    Route::get("filEvalCal", "EvaluationCalculationController@filEvalCal")->name("filEvalCal");
    Route::any('filSurveyCreate', 'SurveyController@filSurveyCreate')->name('filSurveyCreate');
    
    //questions routes
    // Route::any('surveycreate', 'SurveyController@surveyCreate')->name('surveycreate');
    //Route::get('seller/sms/{$id}', 'seller\way2sms\func@hello');

    Route::get('user/{id}', function($id)
        {
            return 'User '.$id;
        });
    Route::any('submitsurvey', 'SurveyController@submitSurvey')->name('submitsurvey');
    Route::resource('surveyrequest', 'SurveyController');
    Route::get("filSurv", "SurveyController@filSurv")->name("filSurv");
    Route::get('google', 'SurveyController@accessToken')->name('google');
    Route::get('addschedule', 'SurveyController@addSchedule')->name('addschedule');
    Route::get('surveytemplate', 'SurveyController@survey_template')->name('surveytemplate');

    Route::get('getcode', 'SurveyController@getCode')->name('getcode');

    Route::get('schedulelist', 'ScheduleController@index')->name('addschedule');

    Route::get('calendarview', 'ScheduleController@calendarview')->name('calendarview');

    Route::get("viewsurvey", "SurveyController@viewSurvey")->name("viewsurvey");
    Route::post("viewsurvey", "SurveyController@viewSurvey")->name("viewsurveyfilter");
   
    Route::get("addmore", "HospitalController@addMore");
    Route::post("addmore", "HospitalController@addMorePost");
    // Route::match(['put', 'patch'], '/add_department/{id}','DoctorController@add_department');
    Route::post("add_department", "DoctorController@add_department")->name('add_department');


    // Route::get("add_department","DoctorController@add_department");

    //Route::get('google-calendar/connect', 'GoogleCalendarController@connect');
    //Route::post('google-calendar/connect', 'GoogleCalendarController@store');
    //Route::get('google', 'GoogleCalendarController@accessToken')->name('google');

    Route::get("reports", "ReportsController@showEvaluationReport")->name("showEvaluationReport");
    Route::post("reports", "ReportsController@showEvaluationReport")->name("EvaluationReportFilter");
    Route::get("reports/pdf", "ReportsController@EvaluationReportPdf")->name("EvaluationReportPdf");
    
});

//hospital routes start

Route::group(['namespace' => 'Admin', 'prefix' => 'hospital', 'middleware' => ['role:ROLE_HOSPITAL']], function () {

    //$this->get('hospital/login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('hospital/login', 'Auth\LoginController@login');
    Route::get('dashboard', 'UserController@dashboard')->name('dashboard');

    Route::resource('users', 'UserController');
    Route::resource('doctors', 'DoctorController');
    Route::resource('hospitals', 'HospitalController');
    Route::resource('emailtemplates', 'EmailController');


    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('profile', 'UserController@updateProfile');
    Route::any('surveycreate', 'SurveyController@surveyCreate')->name('surveycreate');
   
    Route::post('surveystore', 'SurveyController@surveyStore')->name('surveystore');
    Route::post('add_doctor', 'SurveyController@addDoctor')->name('add_doctor');
    Route::post('add_resident', 'SurveyController@addResident')->name('add_resident');
    Route::post("add_survey_name", "SurveyController@addSurveyName")->name('add_survey_name');
    Route::post("add_self_resident", "SurveyController@addSelfResident")->name('add_self_resident');
    Route::post("add_resident_resident", "SurveyController@addResOfResident")->name('add_resident_resident');

    Route::resource('surveyrequest', 'SurveyController');
    Route::get('google', 'SurveyController@accessToken')->name('google');
    Route::get('addschedule', 'SurveyController@addSchedule')->name('addschedule');
    Route::get('surveytemplate', 'SurveyController@survey_template')->name('surveytemplate');

    Route::get('getcode', 'SurveyController@getCode')->name('getcode');

    Route::get('schedulelist', 'ScheduleController@index')->name('addschedule');

    Route::get('calendarview', 'ScheduleController@calendarview')->name('calendarview');

    Route::get('viewsurvey', 'SurveyController@viewSurvey')->name('viewsurvey');
    Route::post("viewsurvey", "SurveyController@viewSurvey")->name("viewsurveyfilter");
    Route::post('add_question', 'AnswerController@addQuestion')->name('add_question');

  //  Route::get("addmore", "HospitalController@addMore");
   // Route::post("addmore", "HospitalController@addMorePost");
    // Route::match(['put', 'patch'], '/add_department/{id}','DoctorController@add_department');
    Route::post("add_department", "DoctorController@add_department")->name('add_department');

    Route::get( 'unauthorize', function() {
    return view( 'backend/unauthorize' );
        });
   
    // Route::get("add_department","DoctorController@add_department");

    //Route::get('google-calendar/connect', 'GoogleCalendarController@connect');
    //Route::post('google-calendar/connect', 'GoogleCalendarController@store');
    //Route::get('google', 'GoogleCalendarController@accessToken')->name('google');

});

//hospital routes end

//Route::get('/dashboard-v2', 'HomeController@dashboardV2')->name('dashboard-v2');
Route::get('/surveypreview/{urlcode}', 'GloballyController@surveyPreview')->name('surveypreview');
Route::post('/surveysubmit/{urlcode}', 'GloballyController@surveySubmit')->name('surveysubmit');