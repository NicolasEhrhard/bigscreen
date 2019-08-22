<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Support\Facades\Auth;

class PieChart{
    public $labels = array();
    public $counts = array();
}

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pieChartForQuestion(int $questionId)
    {
        $pc = new PieChart();

        $question = Question::find($questionId);
        $labels = unserialize($question->choice);
        foreach ($labels as $label){
            array_push($pc->labels,$label);
            array_push($pc->counts,'0');
        }

        $answers = Answer::where('question_id', $question->id)->get();
        if ($answers){
            foreach ($answers as $answer) {
                $key = array_search($answer->value,$pc->labels);
                if ($key > -1)$pc->counts[$key]++;
            }
        }
        print_r($pc->labels);
        print_r($pc->counts);

    }

    public function index()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }

        $this->pieChartForQuestion(6);
        $this->pieChartForQuestion(7);
        $this->pieChartForQuestion(10);

        //return view('admin/accueil');
    }

    public function questionnaires()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }
        return view('admin/questionnaires');
    }

    public function reponses()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }
        return view('admin/reponses');
    }

}
