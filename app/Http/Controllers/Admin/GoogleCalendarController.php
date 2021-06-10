<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Role;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class GoogleCalendarController extends Controller
{

    protected $client;
    protected $service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');       
    }
   
    public function connect()
    {
       /* Get config variables */
        $client_id = Config::get('google.client_id');
        $service_account_name = Config::get('google.service_account_name');
        $key = Config::get('google.api_key');//you can use later

        $this->client = new \Google_Client();
        $this->client->setApplicationName("your_app_name");

        $this->service = new \Google_Service_Calendar($this->client);//Test with Books Service    

        // Load up the helper to initialise the Google Client
        

        //$service = $gcHelper->getCalendarService();
        $optParams = array(
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => '2018-06-03T10:00:00-07:00',
            'timeMax' => '2019-06-03T10:00:00-23:00',
        );
        //$calendarId = "hardik.shyara@bacancytechnology.com";
        $calendarId = "haa682mpcv5k9a12f556034ukc@group.calendar.google.com";

       $googleBookings = $this->service->events->listEvents($calendarId, $optParams); 
   
        print_r($googleBookings);die;
        return $this->service;
    }



    public function  accessToken() {

        $clid = '368283194415-q30kj2ef7r6l1lfia7fm9g7bsvaoseph.apps.googleusercontent.com';
        $login_url = 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode('https://www.bacancytechnology.com') . '&response_type=code&client_id=' . $clid . '&access_type=online';

        //print_r($login_url);die;
        //redirect($login_url);
        return redirect($login_url);

    }

    public function store()
    {
        $client = GoogleCalendar::getClient();
        $authCode = request('code');
        // Load previously authorized credentials from a file.
        $credentialsPath = storage_path('app/google-calendar/client_id.json');
        // Exchange authorization code for an access token.
        $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

        // Store the credentials to disk.
        if (!file_exists(dirname($credentialsPath))) {
            mkdir(dirname($credentialsPath), 0700, true);
        }
        file_put_contents($credentialsPath, json_encode($accessToken));
        return redirect('/google-calendar')->with('message', 'Credentials saved');
    }




   
}
