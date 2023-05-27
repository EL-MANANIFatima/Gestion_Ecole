<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $task = new Task();
        $task->title = $request->title;
        $task->desc = $request->desc;
        $task->due = $request->date;
        $task->owner = auth()->user()->id;
        if (Auth::guard('eleve')->check()) 
            $task->type = 3;
        elseif (Auth::guard('prof')->check()) 
            $task->type = 2;
        else 
            $task->type = 1;
        $task->save();
        toastr()->success('task saved');
        if(Auth::guard('eleve')->check()){
            return redirect()->intended(RouteServiceProvider::ELEVE);
        }
        elseif (Auth::guard('prof')->check()){
            return redirect()->intended(RouteServiceProvider::RESPO);
        }
        else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }      
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req)
    {
        $task = Task::findOrFail($req->key);
        //$task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
       
        
    }
    public function task (Request $request){
        $task = Task::findOrFail($request->key);
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }
}
