<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classe extends Model
{
    use HasFactory;
    protected $table = 'Classes';
    public $timestamps = true;
    protected $fillable = ['Nom','Niv_id'];
    public function Niveau()
    {
        return $this->belongsTo('App\Models\Niveau', 'Niv_id');
    }
    public function derigePar()
    {
        return $this->belongsToMany(Prof::class,'prof_classe','Classe_id','Prof_id');
    }
    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
