<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Schedule:Notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send schedule notification to users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $schedulelist = DB::table('shift_schedules')
            ->join('survey_lists', 'survey_lists.id', '=', 'shift_schedules.surveylist_id') 

            ->join('users', 'survey_lists.requestby', '=', 'users.id')

            ->where('shift_schedules.end_date', Carbon::today())
            ->where('users.notification', 1)
            ->select('shift_schedules.*','users.*')
            ->get()->toArray();

             // print_r($schedulelist);exit;

        foreach ($schedulelist as $schedule) {
            
            $deviceToken = $schedule->device_token;
           
            $message = \PushNotification::Message('This is a reminder to get your evaluation completed',array(
                'sound' => 'default',
                'custom' => array('custom data' => array(
                    'we' => 'want', 'send to app'
                ))
            ));
           
            \PushNotification::app('appNameIOS')
                    ->to($deviceToken)
                    ->send($message);

        }
        
        $this->info('Notification has been send successfully');
    }
}
