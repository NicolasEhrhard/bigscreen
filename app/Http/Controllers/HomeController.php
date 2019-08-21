<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Survey;
use App\User;
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

    public function sondages($lien)
    {
        $user = User::where('lien',$lien)->with('surveys')->first();
        if (!$user) return redirect('home')->with('message', 'ERREUR DE LIEN !');
        return view('sondage',['surveys'=>$user->surveys]);
    }

}
