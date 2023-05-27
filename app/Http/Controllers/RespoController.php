<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRespotRequest;
use App\Models\Image;
use App\Models\Respo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RespoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Respos = Respo::get();
        return view('Respo.index',compact('Respos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Respo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRespotRequest $request)
    {
        try {
            $validated = $request->validated();
            $Respo = new Respo();
            $Respo->Email = $request->Email;
            $Respo->Password = bcrypt($request->Password);
            $Respo->Nom = $request->LName;
            $Respo->Prenom =$request->FName;
            $Respo->JC = $request->JC;
            $Respo->Telephone = $request->Telephone;
            $Respo->Fonction = $request->job;
            $Respo->Adresse =  $request->Address;
            $Respo->save();

            $photo=$request->CNE;
            $name = $photo->getClientOriginalName();
            $photo->storeAs('public/CNE_Respo', $Respo->id . '.png');
        
            $image= new Image();
            $image->url=$name;
            $image->imageable_id= $Respo->id;
            $image->imageable_type = 'App\Models\Respo';
            $image->save();
            toastr()->success('The new teacher has been added succesfully');
            return redirect()->route('Respo.index');
           
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Respo = Respo::findOrFail($id);
        return view('Respo.delete',compact('Respo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Respo = Respo::findOrFail($id);
        return view('Respo.update',compact('Respo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try{
            $Respo = Respo::findOrFail($request->id);
            $Respo->update([
            'email' => $request->Email,
            'Nom' => $request->LName,
            'Prenom' => $request->FName,
            'Fonction' =>$request->job,
            'JC' => $request->JC,
            'password'=>bcrypt($request->Password),
            'Telephone' => $request->Telephone,
            'Adresse' => $request->Address

        ]);
        toastr()->success('The infos has been updated');
        return redirect()->route('Respo.index');
        }catch(\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resp = Respo::findOrFail($id);
        $resp->delete();
        $path = storage_path('app/CNE_Respo/' . $resp->CNE->getClientOriginalName());
        if (file_exists($path)) {
        unlink($path);
        }
        toastr()->success('The parent has been removed');
        return redirect()->route('Respo.index');
    }
    public function det($id)
    {
        $respo = Respo::findOrFail($id);
        return view('Respo.details',compact('respo'));
    }
}
