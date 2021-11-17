<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Doctor extends Model
{
    protected $primaryKey = 'doc_id';
    protected $fillable = [
        'doc_id','department_id','name','slug','phone','hotline','designation','sur_name','description','image','status','h_status','division_id','district_id','upzila_id','sms_status', 'keywords'
    ];
    
    public function appointment()
    {
        return $this->hasMany('App\Models\Doctor','doc_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id');
    }

    public function division(){
        return $this->belongsTo('App\Models\Division','division_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }

    public function upzila(){
        return $this->belongsTo('App\Models\Upzila','upzila_id');
    }

    public function scopeonlySylhet($query)
    {
        return $query->where('district_id',3);
    }
}
