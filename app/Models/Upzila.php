<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use App\Models\Division;

class Upzila extends Model
{
     protected $guarded = [];

     public function district(){
     	return $this->belongsTo(District::class);
     }
     
     public function division(){
        return $this->belongsTo(Division::class);
    }

    public function doctors(){
    	return $this->hasMany('App\Models\Doctor','upzila_id');
    }
}