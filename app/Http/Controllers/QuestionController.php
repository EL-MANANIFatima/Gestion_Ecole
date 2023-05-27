<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $question = new Question();
            $question->titre = $request->qst;
            $question->choix = $request->choix;
            $question->rep = $request->rep;
            $question->score = $request->score;
            $question->Controle_id = $request->c_id;
            $question->save();
            toastr()->success('Saved successfully');
            $ID = $request->c_id;
            $qsts = Question::where('Controle_id',$request->c_id)->get();
            return view('question.index',compact('qsts','ID'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($ID)
    {
        $c_id = $ID;
       return view('question.create',compact('c_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('question.update',compact('question'));
    }

    
    /**
     * Remove the specified resource from storage.
     */
    
    
    public function update(Request $request)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->titre = $request->qst;
            $question->choix = $request->choix;
            $question->rep = $request->rep;
            $question->score = $request->score;
            $question->save();
            toastr()->success('Updated successfully');
            $ID = $question->test->id;
            $qsts = Question::where('Controle_id',$ID)->get();
            return view('question.index',compact('qsts','ID'));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id){
        $q =  Question::findOrFail($id);
        return view('question.delete',compact('q'));
    }
    public function destroy(Request $request)
    {
        try {
            Question::FindOrFail($request->id)->delete();
            toastr()->error('It has been deleted');
            $ID = $request->id;
            $qsts = Question::where('Controle_id',$ID)->get();
            return view('question.index',compact('qsts','ID'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
