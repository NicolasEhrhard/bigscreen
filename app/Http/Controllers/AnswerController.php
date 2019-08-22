<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Survey;
use App\User;
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
        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'name' => explode("@", $request->email)[0],
                'password' => Hash::make(explode("@", $request->email)[0]),
                'lien' => $this->generateRandomString(),
            ]);
        }
        $newSurvey = Survey::where('user_id', $user->id)->where('name', 'Sondage VR')->first();
        if ($newSurvey == null) {
            $newSurvey = new Survey();
            $newSurvey->name = "Sondage VR";
            $newSurvey->user_id = $user->id;
            $user->surveys()->save($newSurvey);
        }

        foreach ($request->all() as $key => $value) {
            if ($key == "_token" || $key == "email") {
            } else {
                $existingAnswer = Answer::where('survey_id', $newSurvey->id)->where('question_id', $key)->first();
                if ($existingAnswer) {
                    $existingAnswer->update([
                        'question_id' => $key,
                        'value' => $value
                    ]);
                }
                else {
                    Answer::create([
                        'question_id' => $key,
                        'value' => $value,
                        'survey_id' => $newSurvey->id,
                    ]);
                }
            }
        };

        return redirect('home')->with('success', $user->lien);
    }

}
