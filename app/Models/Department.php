<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    protected $fillable = ['department_id','name','slug','image','description','status'];

    public function doctor()
    {
        return $this->hasMany('App\Models\Doctor','department_id');
    }
}
