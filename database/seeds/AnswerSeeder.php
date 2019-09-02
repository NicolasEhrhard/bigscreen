<?php

use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 50) as $usid) {

            foreach (range(2, 20) as $i) {
                $val = "";
                switch ($i) {
                    case 2:
                        $val = random_int(5, 99);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 3:
                        $val = array_rand(['Homme', 'Femme', 'Préfère ne pas répondre'], 1);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 4:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 5:
                        $val = "sdf";
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 6:
                        $arr = ['Occulus Rift/s', 'HTC Vive', 'Windows Mixed Reality', 'PSVR'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 7:
                        $arr = ['SteamVR', 'Occulus Store', 'Viveport', 'Playstation VR', 'Google Play', 'Windows Store'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 8:
                        $arr = ['Occulus Quest', 'Occulus Go', 'HTC Vive Pro', 'Autre', 'Aucun'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 9:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 10:
                        $arr = ['Regarder des émissions TV en direct', 'Regarder des films', 'Jouer en solo', 'Jouer en team'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 11:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 12:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 13:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 14:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 15:
                        $val = random_int(1, 5);
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 16:
                        $arr = ['Oui', 'Non'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 17:
                        $arr = ['Oui', 'Non'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 18:
                        $arr = ['Oui', 'Non'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 19:
                        $arr = ['Oui', 'Non'];
                        $index = array_rand($arr, 1);
                        $val =$arr[$index];
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                    case 12:
                        $val = "sdsdsdsdsds";
                        DB::table('answers')->insert([
                            'question_id' => $i,
                            'user_survey_id' => $usid,
                            'value' => $val
                        ]);
                        break;
                }
            }
        }
    }
}
