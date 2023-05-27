<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfResquest;
use App\Models\Absence;
use App\Models\Controle;
use App\Models\Eleve;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Matiere;
use App\Models\Prof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
  {
    $Profs = Prof::get();
    return view('Prof.index',compact('Profs'));
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * 
   */
  public function create()
  {
    $Mats = Matiere::get();
    $Genres = Genre::get();
    return view('Prof.create',compact('Mats','Genres'));
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * 
   */
  public function store(StoreProfResquest $request)
  {
    DB::beginTransaction();
    try {
        $validated = $request->validated();
        $Prof = new Prof();
        $Prof->Email = $request->Email;
        $Prof->Password = bcrypt($request->Password);
        $Prof->Nom = $request->LName;
        $Prof->Prenom = $request->FName;
        $Prof->JC = $request->JC;
        $Prof->Telephone = $request->Telephone;
        $Prof->Adresse = $request->Address;
        $Prof->Mat_id = $request->Mat_id;
        $Prof->Genre_id = $request->Genre_id;
        $Prof->save();

        $photo=$request->CNE;
        $name = $photo->getClientOriginalName();
        $photo->storeAs('public/CNE_Prof',  $Prof->id . '.png');
      
        $image= new Image();
        $image->url=$name;
        $image->imageable_id= $Prof->id;
        $image->imageable_type = 'App\Models\Prof';
        $image->save();

        toastr()->success('The new teacher has been added successfully');
        DB::commit();        
        return redirect()->route('Prof.index');
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
    $Prof = Prof::findOrFail($id);
    return view('Prof.delete',compact('Prof'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * 
   */
  public function edit($id)
  {
    $Prof = Prof::findOrFail($id);
    $Mats = Matiere::get();
    $Genres = Genre::get();
    return view('Prof.update',compact('Prof','Mats','Genres'));  
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * 
   */
  public function update(Request $request)
  {
    
    try{
      $Prof = Prof::findOrFail($request->id);
      $Prof->update([
        'Email' => $request->Email,
        'Nom' => $request->LName,
        'Prenom' => $request->FName,
        'JC' => $request->JC,
        'Telephone' => $request->Telephone,
        'Adresse' =>  $request->Address,
        'Mat_id' => $request->Mat_id,
        'Genre_id' => $request->Genre_id,
        'Password'=> bcrypt($request->Password),
      ]);
      toastr()->success('The infos has been updated ');
      return redirect()->route('Prof.index');
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
    Prof::findOrFail($request->id)->delete();
        toastr()->error('The teacher has been removed');
        return redirect()->route('Prof.index');
    
  }
  public function dashboard(){
    $id = auth()->user()->id;
    $info['classes'] = Prof::findOrFail($id)->derige()->pluck('Classe_id')->count();
    $info['eleves'] = Eleve::where('Classe_id',$id)->count();
    return view('Prof.dashboard',$info);
  }
  public function Classe_List(){
    if(auth()->check()){
    $classes = Prof::findOrFail(auth()->user()->id)->derige()->get();
    return view('Prof.MesClasses',compact('classes'));
    }
  }
  public function Eleve_List($id){
    $eleves = Eleve::where('Classe_id',$id)->get();
    return view('Prof.MesEleves',compact('eleves'));
  }
  public function showAbs($id){
    $abs = Absence::where('Eleve_id',$id)->where('Prof_id',auth()->user()->id)->where('status',0)->get();
    return view('prof.Abs',compact('abs'));
  }

  public function Note($id)
  {
      $bb = Eleve::findOrFail($id);
      $exams = Controle::where('Niv_id',$bb->Niv->id)->where('Classe_id',$bb->Classe->id)->where('Prof_id',auth()->user()->id)->get();
      return view('prof.notes',compact('exams','id'));
  }
  public function det($id)
  {
      $prof = Prof::findOrFail($id);
      return view('prof.details',compact('prof'));
  }

 
}

