<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table = 'factures';
    public function dyalMen(){
        return $this->belongsTo('App\Models\Eleve','Eleve_id');
    }
}
