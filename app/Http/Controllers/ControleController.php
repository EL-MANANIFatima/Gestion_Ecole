<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Controle;
use App\Models\Eleve;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\Prof;
use App\Models\Question;
use Illuminate\Http\Request;

class ControleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Cntr = Controle::where('Prof_id',auth()->user()->id)->get();
        return view('controle.index', compact('Cntr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Prof::findOrFail(auth()->user()->id)->derige;
        return view('controle.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $Controle = new Controle();
            $Controle->nom = $request->title;
            $Controle->Classe_id = $request->Classe_id;
            $niv = Classe::FindOrFail($request->Classe_id)->Niveau->id;
            $Controle->Niv_id = $niv;
            $Controle->Prof_id = auth()->user()->id;
            $Controle->type = $request->type;
            $Controle->date_cnt = $request->date_cnt;
            $Controle->save();
            toastr()->success('Added successfully');
            return redirect()->route('Controle.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $c =  Controle::findOrFail($id);
        return view('controle.delete',compact('c'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $c = Controle::FindOrFail($id);
        $classes = Prof::FindOrFail(auth()->user()->id)->derige()->get();
        return view('controle.update', compact('c','classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $Controle = Controle::FindOrFail($request->id);
            $Controle->nom =  $request->title;
            $Controle->Classe_id = $request->Classe_id;
            $niv = Classe::FindOrFail($request->Classe_id)->Niveau->id;
            $Controle->Niv_id = $niv;
            $Controle->Prof_id = auth()->user()->id;
            $Controle->date_cnt = $request->date_cnt;
            $Controle->save();
            toastr()->success('Updated successfully');
            return redirect()->route('Controle.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        Controle::FindOrFail($req->id)->delete();
        toastr()->error('the quizz has been deleted');
        return redirect()->route('Controle.index');
    }
    public function details($id){
        $ID = $id;
        $qsts = Question::where('Controle_id',$id)->get();
        return view('question.index',compact('qsts','ID'));

    }
    public function Notes($id){
        $notes = Note::where('exam_id',$id)->get();
        return view('controle.note',compact('notes'));

    }
    public function Resultat($id){
        $eleves = Eleve::where('Classe_id',$id)->get();
        $data = [];
        foreach ($eleves as $eleve) {
            $notes = Note::where('Eleve_id', $eleve->id)
                ->where('Mat_id', auth()->user()->enseigne->id)
                ->get();
            $data[$eleve->id] = $notes;
            }
        return view('Prof.ResultatMat',compact('data','eleves'));
    }


}
