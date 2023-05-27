<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Niveau;
use App\Models\Prof;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
  {
    $Classes = Classe::get();
    $Niveaux = Niveau::get();
    $Profs = Prof::all();
    return view('Classe.index',compact('Classes','Niveaux','Profs'));

  }

  /**
   * Show the form for creating a new resource.
   *
   *
   */
  public function create()
  {
    $Niveaux = Niveau::get();
    $Profs = Prof::all();
    return view('Classe.create',compact('Niveaux','Profs'));
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * 
   */
  public function store(Request $request)
  {
    try {
        $Classe = new Classe();
        $Classe->Nom = $request->Name;
        $Classe->Niv_id = $request->Niveau_id;
        $Classe->save();
        $Classe->derigePar()->attach($request->Prof_id);
        toastr()->success('The neww class has been added successfully');
        return redirect()->route('Classe.index');
      }catch(\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * 
   */
  public function show($id)
  {  
    $Classe = Classe::findOrFail($id);
    return view('Classe.delete',compact('Classe'));  
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * 
   */
  public function edit($id)
  {
    $Classe = Classe::findOrFail($id);
    $Niveaux = Niveau::get();
    $Profs = Prof::get();
    return view('Classe.update',compact('Classe','Niveaux','Profs'));
  }

  /**
   * Update the specified resource in storage.
   *
   * 
   * 
   */
  public function update(Request $request)
  {
    
    try{
      $Classe = Classe::findOrFail($request->id);
      $Classe->Nom = $request->Name;
      $Classe->Niv_id = $request->Niveau_id;
      $Classe->save();
      $Classe->derigePar()->sync($request->Prof_id);
      if (isset($request->Prof_id)) {
       $Classe->derigePar()->syncWithoutDetaching($request->Prof_id);
    } else {
        $Classe->derigePar()->sync(array());
    }
      toastr()->success('The infos has been updated');
      return redirect()->route('Classe.index');
    }catch(\Exception $e){
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * 
   */
  public function destroy(Request $request)
  {
    $Classe = Classe::findOrFail($request->id)->delete();
    toastr()->error('The class has been deleted');
    return redirect()->route('Classe.index');
  }
 
    public function filter(Request $request)
    {
        $Niveaux = Niveau::get();
        $det = Classe::where('Niv_id',$request->key)->get();
       // return view('Classe.index',compact('Niveaux','det'));
       return response()->json(['det' => $det]);
    }
    public function AdminEleves($id){
      $eleves = Eleve::where('Classe_id',$id)->get();
      return view('Eleve.AdminEleves',compact('eleves'));
    }
  
}