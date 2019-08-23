<?php

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    public function run()
    {
        DB::table('surveys')->insert([
            'name' => 'Sondage VR',
            'created_at' => new DateTime(),
        ]);
    }
}
