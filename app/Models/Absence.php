<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Prof()
    {
        return $this->belongsTo('App\Models\Prof', 'Prof_id');
    }
    public function Eleve()
    {
        return $this->belongsTo('App\Models\Eleve', 'Eleve_id');
    }
}
