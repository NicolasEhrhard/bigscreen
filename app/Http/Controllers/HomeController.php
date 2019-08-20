<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Illuminate\Routing\Route;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = Question::all();
        return view('home', ['questions' => $questions]);
    }

    public function sondage($lien)
    {
        $survey = Survey::where('lien',$lien)->first();
        if (!$survey) return redirect('home')->with('message', 'ERREUR DE LIEN !');
        $answers = Answer::where('survey_id', $survey->id);
        return view('sondage',['survey'=>$survey,'answers'=>$answers]);
    }

}
