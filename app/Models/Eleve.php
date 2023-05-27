<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Eleve extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = 'eleves';

    protected $guarded =[];
    
 

    public function Respo()
    {
        return $this->belongsTo('App\Models\Respo', 'Respo_id');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre', 'Genre_id');
    }


    public function Niv()
    {
        return $this->belongsTo('App\Models\Niveau', 'Niv_id');
    }
    public function classe()
    {
        return $this->belongsTo('App\Models\Classe', 'Classe_id');
    }
    public function images():MorphMany
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function Absence(){
        return $this->hasMany('App\Models\Absence','Eleve_id');
    }
    public function notes(){
        return $this->hasMany('App\Models\Absence','Eleve_id');
    }
   
}
