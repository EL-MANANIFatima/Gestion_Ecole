<?php

namespace App\Http\Controllers;

use App\Http\Requests\EleveRequest;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Niveau;
use App\Models\Respo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Eleves = Eleve::all();
        return view('Eleve.index',compact('Eleves'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info['Classes'] = Classe::all();
        $info['Niveaux'] = Niveau::all();
       $info['Respos'] = Respo::all();
       $info['Genres'] = Genre::all();
       return view('Eleve.create',$info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EleveRequest $request)
    {
        DB::beginTransaction();
        try {
            $validated = $request->validated();
            $Eleve = new Eleve();
            $Eleve->Nom = $request->LName;
            $Eleve->Prenom = $request-> FName;
            $Eleve->Email = $request->email;
            $Eleve->password = bcrypt($request->password);
            $Eleve->genre_id = $request->genre_id;
            $Eleve->Date_Naiss = $request->Date_Naiss;
            $Eleve->Niv_id = $request->Niv_id;
            $Eleve->Classe_id = $request->Classe_id;
            $Eleve->Respo_id = $request->Respo_id;
            $Eleve->save();
 
            $photo=$request->pic;
            $name = $photo->getClientOriginalName();
            $photo->storeAs('public/Pic_Eleves', $Eleve->id . '.png');

            $image= new Image();
            $image->url=$name;
            $image->imageable_id= $Eleve->id;
            $image->imageable_type = 'App\Models\Eleve';
            $image->save();

            toastr()->success('The new student has been added successfully');
            DB::commit();
            return redirect()->route('Eleve.index');
           
        }   

        catch (\Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Eleve =  Eleve::findOrFail($id);
        return view('Eleve.delete',compact('Eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info['Niveaux'] = Niveau::all();
        $info['Respos'] = Respo::all();
        $info['Genres'] = Genre::all();
        $info['classes'] = Classe::all();
        $Eleve =  Eleve::findOrFail($id);
        return view('Eleve.update',$info,compact('Eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $Eleve = Eleve::findorfail($request->id);
            $Eleve->Nom =  $request->LName;
            $Eleve->Prenom = $request->FName;
            $Eleve->Email = $request->Email;
            $Eleve->password = bcrypt($request->password);
            $Eleve->genre_id = $request->genre_id;
            $Eleve->Date_Naiss = $request->Date_Naiss;
            $Eleve->Niv_id = $request->Niv_id;
            $Eleve->Classe_id = $request->Classe_id;
            $Eleve->Respo_id = $request->Respo_id;
            $Eleve->save();
            toastr()->success('The infos has been updated successfully');
            return redirect()->route('Eleve.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req)
    {
        Eleve::findOrFail($req->id)->delete();
        toastr()->error('The student has been deleted');
        return redirect()->route('Eleve.index');
    }
    public function search(Request $req)
    {
        
        $search = Eleve::where('Nom', 'like', '%' . $req->key . '%')->orWhere('Prenom', 'like', '%' . $req->key . '%')->get();
        return $search;

    }
    public function det($id){
        $eleve = Eleve::findOrFail($id);
        return view('Eleve.details',compact('eleve'));
    }
   
}
