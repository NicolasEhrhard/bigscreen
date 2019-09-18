<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use App\User;
use App\UserSurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $surveys = Survey::all();
        if (count($surveys) == 1) return $this->loadQuestions($surveys[0]->id);
        $questions = Question::all();
        return view('home', ['questions' => $questions]);
    }

    public function loadQuestions(int $surveyId)
    {
        $questions = Question::where('survey_id', $surveyId)->get();
        return view('home', ['questions' => $questions, 'surveyId' => $surveyId]);
    }

    public function sondages($lien)
    {
        $user = User::where('lien', $lien)->with('userSurveys')->first();
        if (!$user) return redirect('home')->with('message', 'ERREUR DE LIEN !');
        return view('sondage', ['userSurveys' => $user->userSurveys]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,6}/i',
        ]);

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
            if ($key == "_token" | $key == "email" | $key == "surveyId") ;
            else {
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
        }
        return redirect('home')->with('success', $user->lien);

    }
}

