<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Socialorganize extends Model
{
    protected $fillable = [
        'name','slug','type','organizes','phone','hotline','address','details','image','status'
    ];
}
