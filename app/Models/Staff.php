<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $primaryKey = 'staff_id';

    protected $fillable = [
        'staff_id','name','slug','designation','details','phone','email','address','fb_link','twitter_link','instagram_link','image','status'
    ];
}
