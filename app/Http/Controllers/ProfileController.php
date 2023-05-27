<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Prof;
use App\Models\Respo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }
    /**
     * Change the password
     *
     * 
     */
    public function password(PasswordRequest $request)
    {
        if (!empty($request->password)) {
            $user = null;
        
            if (Auth::guard('prof')->check()) {
                $user = Prof::findOrFail(auth()->user()->id);
            } elseif (Auth::guard('eleve')->check()) {
                $user = Eleve::findOrFail(auth()->user()->id);
            } elseif (Auth::guard('respo')->check()) {
                $user = Respo::findOrFail(auth()->user()->id);
            } else {
                $user = User::findOrFail(auth()->user()->id);
            }
            
            $user->password = bcrypt($request->password);
            $user->save();
        }
        
        toastr()->success(trans('messages.Update'));
        return redirect()->back();
        
    }
}
