<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->role != 'administrateur'){
            return redirect('home')->with('message',"VOUS N'ETES PAS AUTORISE A ACCEDER A L'ADMINISTRATION DE CE SITE !");
        }
        return view('admin/admin');
    }

    public function questionnaires()
    {
        return view('admin/questionnaires');
    }

    public function reponses()
    {
        return view('admin/reponses');
    }

}
