<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';
    public $timestamps = true;
    protected $fillable = ['choix','Controle_id','rep','titre','score'];
    public function test()
    {
        return $this->belongsTo('App\Models\Controle', 'Controle_id');
    }
}
