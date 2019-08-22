<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use Illuminate\Support\Facades\Auth;

class Chart
{
    public $title = '';
    public $id = 0;
    public $labels = array();
    public $datas = array();
    public $colors = array();
}

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public function pieChart(int $questionId): Chart
    {
        $question = Question::find($questionId);
        $pc = new Chart();
        $pc->title = $question->title;
        $pc->id = $question->id;

        $labels = unserialize($question->choice);
        foreach ($labels as $label) {
            array_push($pc->labels, $label);
            array_push($pc->datas, '0');
            array_push($pc->colors, $this->rand_color());
        }

        $answers = Answer::where('question_id', $question->id)->get();
        if ($answers) {
            foreach ($answers as $answer) {
                $key = array_search($answer->value, $pc->labels);
                if ($key > -1) $pc->datas[$key]++;
            }
        }
        return $pc;
    }

    public function radarChart()
    {
        $pc = new Chart();
        $pc->title = "NUMERIC";
        array_push($pc->labels, '1');
        array_push($pc->labels, '2');
        array_push($pc->labels, '3');
        array_push($pc->labels, '4');
        array_push($pc->labels, '5');
        for ($i = 0; $i <= count($pc->labels); ++$i) {
            array_push($pc->datas, '0');
            array_push($pc->colors, $this->rand_color());
        }

        for ($i = 11; $i <= 15; ++$i) {
            $question = Question::find($i);
            $answers = Answer::where('question_id', $question->id)->get();
            if ($answers) {
                foreach ($answers as $answer) {
                    $key = array_search($answer->value, $pc->labels);
                    if ($key > -1) $pc->datas[$key]++;
                }
            }
        }

        return $pc;
    }

    public function index()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }

        $pcc = [];
        array_push($pcc, $this->pieChart(6));
        array_push($pcc, $this->pieChart(7));
        array_push($pcc, $this->pieChart(10));
        $rcc = [];
        array_push($rcc, $this->radarChart());

        return view('admin/accueil', ['allPieCharts' => $pcc, 'allRadarCharts' => $rcc]);
    }

    public function questionnaires()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }
        return view('admin/questionnaires',['questions'=>Question::all()]);
    }

    public function reponses()
    {
        if (Auth::user()->role != 'administrateur') {
            return redirect('home')->with('message', "VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }
        return view('admin/reponses',['surveys'=>Survey::all()]);
    }

}
