<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Classe;
use App\Models\Eleve;
use App\Models\Prof;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Prof::findOrFail(auth()->user()->id)->derige()->get();
        return view('absence.MesClasses',compact('classes'));
    }
    public function select($Classe_id)
    {
        return view('absence.selectDate',compact('Classe_id')); 
    }
    public function allah(Request $request)
    {  
        $selected = $request->abs_date;
        $eleves = Eleve::with('Absence')->where('Classe_id',$request->Classe_id)->get();
        return view ('absence.index',compact('eleves','selected'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function store(Request $request)
    {
        try {

            foreach ($request->abss as $id => $Absence) {

                if( $Absence == 'presence' ) {
                    $status = true;
                } else if( $Absence == 'absent' ){
                    $status = false;
                }

                Absence::UpdateOrcreate(['Eleve_id'=>$id,'abs_date'=>$request->abs_date],[
                    'Eleve_id'=> $id,
                    'abs_date'=> $request->abs_date,
                    'status'=> $status,
                    'Prof_id'=> auth()->user()->id
                ]);

            }

            toastr()->success('Saved successfully');
            return redirect()->route('Absence.index');


        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   
   
    

    

    
}
