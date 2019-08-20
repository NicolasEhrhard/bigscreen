<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SurveySeeder  extends Seeder
{
    public function run()
    {
        DB::table('surveys')->insert([
            'email' => 'admin@bigscreen.fr',
            'lien' => Hash::make('admin@bigscreen.fr'),
        ]);
    }

}
