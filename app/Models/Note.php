<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function Eleve()
    {
        return $this->belongsTo('App\Models\Eleve', 'Eleve_id');
    }
    public function Controle()
    {
        return $this->belongsTo('App\Models\Controle', 'exam_id');
    }
    public function Matiere()
    {
        return $this->belongsTo('App\Models\Matiere', 'Mat_id');
    }
}
