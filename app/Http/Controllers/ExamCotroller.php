<?php

namespace App\Http\Controllers;

use App\Models\Controle;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Controle::where('Niv_id', auth()->user()->Niv_id)
        ->where('Classe_id', auth()->user()->Classe_id)
        ->orderBy('id', 'DESC')
        ->get();
    return view('exams.index', compact('exams'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function resultat($id)
    {
        $matieres = Matiere::whereNotIn('id',[10])->get();
        $data = [];
        foreach ($matieres as $matiere) {
            $notes = Note::where('Eleve_id', $id)
                ->where('Mat_id', $matiere->id)
                ->get();
            $data[$matiere->libelle] = $notes;
            }
        return view('Eleve.SuiviNote',compact('data','matieres'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($exam_id)
    {
        $Eleve_id = Auth::user()->id;
        return view('livewire.question',compact('exam_id','Eleve_id'));
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
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
