<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Controle extends Model
{
    use HasFactory;

    public function prof()
    {
        return $this->belongsTo('App\Models\Prof', 'Prof_id');
    }

    public function Niv()
    {
        return $this->belongsTo('App\Models\Niveau', 'Niv_id');
    }


    public function Classe()
    {
        return $this->belongsTo('App\Models\Classe', 'Classe_id');
    }
   

}
