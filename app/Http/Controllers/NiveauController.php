<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Toastr;
use App\Http\Requests\SaveNivRequest;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Niveaux = Niveau::get();
        return view('Niveau.index',compact('Niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Niveau.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveNivRequest $request)
    {
        try{
            $validated = $request->validated();
            $Niveau = new Niveau();
            $Niveau->Nom =  $request->Name;
            $Niveau->bxh7al= $request->bxh7al;
            $Niveau->save();
            toastr()->success('The new garde has been added');
            return redirect()->route('Niveau.index');
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Niveau = Niveau::findOrFail($id);
        return view('Niveau.delete',compact('Niveau'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Niveau = Niveau::findOrFail($id);
        return view('Niveau.update',compact('Niveau'));
    }  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            $Niveau = Niveau::findOrFail($request->id);
            $Niveau->update([
                $Niveau->Nom = $request->Name,
                $Niveau->bxh7al = $request->bxh7al 
            ]);
            toastr()->success('The infos have been updated successfully');
            return redirect()->route('Niveau.index');
            }catch(\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

          }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
          $Niv = Niveau::findOrFail($request->id)->delete();
          toastr()->error('The grade has been deleted');
          return redirect()->route('Niveau.index');
    }
}
