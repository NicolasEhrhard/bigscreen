<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SurveySeeder::class);
        $this->call(UserSurveySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
    }
}
