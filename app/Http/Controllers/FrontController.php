<?php

namespace App\Http\Controllers;

use App\Question;

class FrontController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('home', ['questions' => $questions]);
    }
}
