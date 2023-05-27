<?php

namespace App\Http\Livewire;

use App\Models\Eleve;
use App\Models\Prof;
use Carbon\Carbon;
use Livewire\Component;

class Absence extends Component
{
    public $selectedDate,$Classe_id;

    public function mount($id)
    {   
        $this->Classe_id = $id;
        //$this->selectedDate = Carbon::today()->format('d-m-Y');
    }
    public function render()
    {
    
        $eleves = Eleve::with('Absence')->where('Classe_id',$this->Classe_id)->get();
        return view ('Absence.index',compact('eleves'));
    }
    public function store()
    {
        return $this->selectedDate;
        // try {

        //     foreach ($request->abss as $id => $Absence) {

        //         if( $Absence == 'presence' ) {
        //             $status = true;
        //         } else if( $Absence == 'absent' ){
        //             $status = false;
        //         }

        //         Absence::create([
        //             'Eleve_id'=> $id,
        //             'Niv_id'=> $request->Niv_id,
        //             'Classe_id'=> $this->Classe_id,
        //             'abs_date'=> $this->selectedDate,
        //             'status'=> $status
        //         ]);

        //     }

        //     toastr()->success(trans('messages.success'));
        //     return redirect()->back();

        // }

        // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }
    }

}
