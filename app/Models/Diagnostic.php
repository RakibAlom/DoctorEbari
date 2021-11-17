<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $primaryKey = 'diag_id';
    protected $fillable = [
        'diag_id','name','slug','phone','hotline','address','details','image','status','call_status',
    ];
}
