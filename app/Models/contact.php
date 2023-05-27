<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class contact extends Model
{
    use HasFactory;
  
    public $table = 'contacts';
    public $fillable = ['name', 'email', 'phone', 'message'];
  
    
    // public static function boot() {
  
    //     parent::boot();
  
    //     static::created(function ($item) {
                
    //         $adminEmail = "fff189980@gmail.com";
    //         Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }
}
