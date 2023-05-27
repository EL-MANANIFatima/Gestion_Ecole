<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    public $fillable =['url','imageable_id','imageable_type'];
    protected $table = 'images';
    use HasFactory;
    public function imageable():MorphTo
    {
        return $this->morphTo();
    } 
}