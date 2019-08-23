<?php

namespace App\Http\Controllers;

use App\Question;
use App\Survey;
use App\User;

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
        $questions = Question::where('survey_id',$surveyId)->get();
        return view('home', ['questions' => $questions]);
    }

    public function sondages($lien)
    {
        $user = User::where('lien',$lien)->with('surveys')->first();
        if (!$user) return redirect('home')->with('message', 'ERREUR DE LIEN !');
        return view('sondage',['surveys'=>$user->surveys]);
    }

}
