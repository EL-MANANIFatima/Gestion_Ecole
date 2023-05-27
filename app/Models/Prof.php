<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Classe;


class Prof extends Authenticatable
{
    
    protected $table = 'profs';
    public $timestamps = true;

    use HasFactory;
    protected $guarded =[];

    public function est()
    {
        return $this->hasOne('App\Models\Genre', 'id','Genre_id');
    }

    public function enseigne()
    {
        return $this->hasOne('App\Models\Matiere', 'id','Mat_id');
    }
    public function derige()
    {
        return $this->belongsToMany(Classe::class,'prof_classe','Prof_id','Classe_id');
    }
    public function events()
    {
        return $this->morphMany(Event::class, 'creator');
    }
    public function meetings()
{
    return $this->hasMany(Online::class);
}
}
