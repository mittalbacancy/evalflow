<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::get('hospitallist', 'API\UserController@hospitalList');
Route::post('departmentlist', 'UserController@departmentList');




Route::group(['middleware' => 'auth:api'], function(){
	Route::post('details', 'API\UserController@details');	
	Route::post('notification', 'API\UserController@notificationSetting');
	Route::post('editprofile', 'API\UserController@editProfile');
    Route::post('changepassword', 'API\UserController@changePassword');


    // Route::get('hospitallist', 'API\UserController@hospitalList');

    Route::post('doctorlist', 'API\SurveyController@getDoctorList');
    Route::get('surveylist', 'API\SurveyController@surveyList');

    Route::post('surveyrequest', 'API\SurveyController@surveyRequest');
    Route::get('surveyhistory', 'API\SurveyController@surveyHistory');
    Route::get('surveyurl', 'API\SurveyController@surveyUrl');

});

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'password'
    ], function () {    
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });

//Route::get('signup/activate/{token}', 'API\UserController@signupActivate');

Route::group([
    'prefix' => 'auth'
    ], function () {

        Route::get('signup/activate/{token}', 'API\UserController@signupActivate'); 

    });

//version 2 apis route start
Route::group(['prefix' => 'v2', 'namespace' => 'API\v2'], function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::get('hospitallist', 'UserController@hospitalList');
    Route::post('departmentlist', 'UserController@departmentList');

    Route::group(['middleware' => 'auth:api'], function () {
      Route::post('details', 'UserController@details'); 
      Route::post('notification', 'UserController@notificationSetting');
      Route::post('editprofile', 'UserController@editProfile');
      Route::post('changepassword', 'UserController@changePassword');

      Route::post('doctorlist', 'SurveyController@getDoctorList');
      Route::get('surveylist', 'SurveyController@surveyList');
      Route::get('surveytype', 'SurveyController@surveyType');
      Route::post('resi_self_evaluation', 'SurveyController@resiSelfRequest');
      Route::post('resi_resident_evaluation', 'SurveyController@resiResidentRequest');
      Route::post('resi_doctor_evaluation', 'SurveyController@resiDoctorRequest');
      Route::post('doc_resident_evaluation', 'SurveyController@docResidentRequest');

      Route::post('surveyrequest', 'SurveyController@surveyRequest');
      Route::get('surveyhistory', 'SurveyController@surveyHistory');
      Route::get('surveyurl', 'SurveyController@surveyUrl');
      Route::get('survey_track_history', 'SurveyController@surveyTrackHistory');
      
      Route::post('sendLink', 'SurveyController@sendLink'); 
       
  });

});

Route::group([    
    'namespace' => 'Auth',    
    'middleware' => 'api',    
    'prefix' => 'v2/password'
    ], function () {    
        Route::post('create', 'PasswordResetController@create');
        Route::get('find/{token}', 'PasswordResetController@find');
        Route::post('reset', 'PasswordResetController@reset');
    });

//Route::get('signup/activate/{token}', 'API\UserController@signupActivate');

Route::group([
    'prefix' => 'v2/auth'
    ], function () {

        Route::get('signup/activate/{token}', 'API\UserController@signupActivate'); 

    });

//version 2 apis route end

