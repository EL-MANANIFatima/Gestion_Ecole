<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
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
    public function examNote($classe,$controle)
    {

        $eleves = Eleve::where('Classe_id',$classe)->get();
        return view('controle.controleClasse',compact('eleves','controle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        $notes = $request->input('note');

        foreach ($notes as $eleveId => $score) {
            $note = Note::where('Eleve_id', $eleveId)->where('exam_id', $request->controle)->first();
    
            if ($note) {
                $note->score = $score;
                $note->save();
            } else {
                Note::create([
                    'Eleve_id' => $eleveId,
                    'exam_id' => $request->controle,
                    'score' => $score,
                    'date' => date('Y-m-d'),
                    'Mat_id'=> auth()->user()->enseigne->id
                ]);
            }
        }
        toastr()->success('added successfully');
        return redirect()->back();
        }catch (\Exception $e){
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $notes = $request->input('note');

       foreach ($notes as $eleveId => $eleveNotes) {
    foreach ($eleveNotes as $index => $note) {
        $existingNote = Note::where('Eleve_id', $eleveId)
            ->where('exam_id', $index) // Assuming $index represents the exam_id
            ->first();

        if ($existingNote) {
            $existingNote->score = $note;
            $existingNote->save();
        }
    }
}
        toastr()->success('Updated successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
