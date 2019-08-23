<?php

namespace App\Http\Controllers;

use App\Answer;
use App\User;
use App\UserSurvey;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user == null) {
            $user = User::create([
                'email' => $request->email,
                'name' => explode("@", $request->email)[0],
                'password' => Hash::make(explode("@", $request->email)[0]),
                'lien' => Str::uuid()->toString(),
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
            if ($key == "_token" || $key == "email" || $key == "surveyId") {
            } else {
                $existingAnswer = Answer::where('user_survey_id', $newUserSurvey->id)->where('question_id', $key)->first();
                if ($existingAnswer) $existingAnswer->update(['value' => $value]);
                else {
                    Answer::create([
                        'question_id' => $key,
                        'value' => $value,
                        'user_survey_id' => $newUserSurvey->id,
                    ]);
                }
            }
        };

        return redirect('home')->with('success', $user->lien);
    }

}
