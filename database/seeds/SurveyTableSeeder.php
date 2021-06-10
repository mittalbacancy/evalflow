<?php

use Illuminate\Database\Seeder;
use App\Model\Survey;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Survey::truncate();
        $data = [];

        array_push($data, [
            'survey_name'     => 'Ward Interns',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        array_push($data, [
            'survey_name'     => 'Ward Residents',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        array_push($data, [
            'survey_name'     => 'Subspecialty Housestaff Evaluation',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        array_push($data, [
            'survey_name'     => 'ICU Housestaff Evaluation',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        array_push($data, [
            'survey_name'     => 'Clinic',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Survey::insert($data);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
