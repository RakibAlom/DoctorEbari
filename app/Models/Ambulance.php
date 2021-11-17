<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $fillable = [
        'name','slug','phone','hotline','address','details','image','status'
    ];
}
