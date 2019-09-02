<?php

use Illuminate\Database\Seeder;

class UserSurveySeeder extends Seeder
{
    public function run()
    {
        foreach (range(1,50) as $i) {
            DB::table('user_surveys')->insert([
                'user_id' => $i,
                'survey_id' => 1,
            ]);
        }

    }
}
