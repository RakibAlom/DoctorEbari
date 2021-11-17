<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;

class Division extends Model
{
    protected $guarded = [];
    public function district()
    {
    	return $this->hasMany(District::class);
    }

    public function doctors(){
    	return $this->hasMany('App\Models\Doctor','division_id');
    }
}
