<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Survey;
use App\User;
use App\UserSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnswerController extends Controller
{
    public function index()
    {
    }

    function generateRandomString($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            $user = User::create([
                'email' => $request->email,
                'name' => explode("@", $request->email)[0],
                'password' => Hash::make(explode("@", $request->email)[0]),
                'lien' => $this->generateRandomString(),
            ]);
        }

        $newUserSurvey = UserSurvey::where('user_id', $user->id)->where('survey_id', $request->surveyId)->first();
        if ($newUserSurvey == null) {
            $newUserSurvey = new UserSurvey();
            $newUserSurvey->user_id = $user->id;
            $newUserSurvey->survey_id = $request->surveyId;
            $user->userSurveys()->save($newUserSurvey);
        }

        foreach ($request->all() as $key => $value) {
            if ($key == "_token" || $key == "email") {
            } else {
                $existingAnswer = Answer::where('user_survey_id', $newUserSurvey->id)->where('question_id', $key)->first();
                $existingAnswer->updateOrCreate([
                    'question_id' => $key,
                    'value' => $value,
                    'survey_id' => $newUserSurvey->id,
                ]);
            }
        };

        return redirect('home')->with('success', $user->lien);
    }

}
