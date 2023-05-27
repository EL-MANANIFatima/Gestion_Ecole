<?php

namespace App\Http;

use App\Providers\RouteServiceProvider;

trait idk
{
    public function chekGuard($request){

        if($request->type == 'eleve'){
            $guard= 'eleve';
        }
        elseif ($request->type == 'respo'){
            $guard= 'respo';
        }
        elseif ($request->type == 'prof'){
            $guard= 'prof';
        }
        else{
            $guard= 'web';
        }
        return $guard;
    }

    public function redirect($request){

        if($request->type == 'eleve'){
            return redirect()->intended(RouteServiceProvider::ELEVE);
        }
        elseif ($request->type == 'respo'){
            return redirect()->intended(RouteServiceProvider::RESPO);
        }
        elseif ($request->type == 'prof'){
            return redirect()->intended(RouteServiceProvider::PROF);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}