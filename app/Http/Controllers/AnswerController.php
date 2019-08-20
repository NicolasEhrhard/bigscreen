<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnswerController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $survey = Survey::where('email',$request->email)->first();
        if (!$survey){
            $survey =Survey::create([
                'email'=>$request->email,
                'lien' => $request->root()."/". Hash::make($request->email)
            ]);
        }
        return redirect('home')->with('success', $survey->lien);
    }


}
