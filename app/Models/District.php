<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Division;

class District extends Model
{
    protected $guarded = [];
    public function division()
    {
    	return $this->belongsTo(Division::class);
    }

    public function doctors(){
    	return $this->hasMany('App\Models\Doctor','district_id');
    }
}
