<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable=['titre','deb','chkon_id','chkon_type'];
    public function creator()
    {
        return $this->morphTo();
    }
}
