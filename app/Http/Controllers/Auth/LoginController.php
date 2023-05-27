<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\idk;


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

    use idk;

    public function __construct()
    {
        $this->middleware('guest')->except('logOut');
    }


    public function xhkon($type){
        return view('auth.login',compact('type'));
    }

    public function logIn(Request $request){
        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
         }
         else return $request->email.' '.$request->password.' '.$this->chekGuard($request);
    }
    
    public function logOut(Request $request,$type)
    {
        if (Auth::guard($type)->check()) {
            Auth::guard($type)->logout();
        }
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    
}
