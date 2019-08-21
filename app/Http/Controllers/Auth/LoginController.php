<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait BigScreenAuthenticates
{
    use AuthenticatesUsers {
        AuthenticatesUsers::validateLogin as bigScreenValidateLogin;
    }

    public function bigScreenLogin(Request $request) {
        $this->bigScreenValidateLogin();

        User::where('email',$this->username())->first();

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use BigScreenAuthenticates;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest' )->except('logout');
    }
}
