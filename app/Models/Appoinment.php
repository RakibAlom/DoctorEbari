<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Department;

class Appoinment extends Model
{
    protected $primaryKey = 'appoint_id';
    protected $fillable = [
        'appoint_id','name','department_id','doc_id','age','phone','email','doctor_shown','past_doctor','details','appoint_date','time','entry_date','month','year','status'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor','doc_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department','department_id');
    }

}
