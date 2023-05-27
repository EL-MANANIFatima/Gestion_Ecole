<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;


class Respo extends Authenticatable
{
    use HasFactory;
    use Billable;

    protected $table = 'respos';
    public $timestamps = true;
    protected $guarded = [];
}
