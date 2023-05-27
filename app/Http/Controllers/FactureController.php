<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Facture;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Facts = Facture::all();
        return view('facture.index',compact('Facts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        
          
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $info['Eleve_id'] = $id;
        $info['bxh7al'] = Eleve::findOrFail($id)->Niv->bxh7al;
        $info['paye'] = Facture::where('Eleve_id',$id)->sum('ch7al');
        $info['rest'] = $info['bxh7al']-$info['paye']; 
        return view('Eleve.AdminPay',$info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
    }
   
}
