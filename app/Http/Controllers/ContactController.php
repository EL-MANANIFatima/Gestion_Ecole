<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use App\Models\contact;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);
        
        contact::create($request->all());
        //Mail::to('fff189980@gmail.com')->send(new ContactMail($request));
        toastr()->success('Thank u for contacting us, we will make sure to raply shortly ');
        return redirect()->back();
  
    }
}
