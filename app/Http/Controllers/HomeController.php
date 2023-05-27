<?php

namespace App\Http\Controllers;
use App\Models\contact;
use App\Models\Niveau;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('dashboard');
    }
    public function index()
    {
        return view('layouts.AuthType');
    }
    public function nbrEleve(){
        $niveaus = Niveau::withCount('eleves')->get();
        $gradesData = $niveaus->pluck('eleves_count')->toArray();
        return response()->json($gradesData);
    }
    public function agharass($id){
        $ID = $id; 
        return view('livewire.absence',compact('ID'));
    }
    public function notif(){
        return view('alerts.notif');
    }
    public function mar($id){
        if($id){
            auth()->user()->notifications->where('id',$id)->markAsRead();
        }
        return redirect()->back();
    }
    public function contact(){
        $comments = contact::get();
        return view('alerts.index',compact('comments'));
    }

}
