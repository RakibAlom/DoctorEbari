<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $primaryKey = 'h_id';
    protected $fillable = [
        'h_id','name','slug','phone','hotline','address','details','image','status','call_status',
    ];
}
