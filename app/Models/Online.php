<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;
    protected $table = 'zooms';
    public $fillable= ['integration','Niv_id','Classe_id','organisateur','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function Niv()
    {
        return $this->belongsTo('App\Models\Niveau', 'Niv_id');
    }


    public function Classe()
    {
        return $this->belongsTo('App\Models\Classe', 'Classe_id');
    }


    public function user()
    {
        return $this->belongsTo(Prof::class, 'organisateur');
    }
}
