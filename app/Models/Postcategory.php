<?php

namespace App\Models;
use App\Models\Post;


use Illuminate\Database\Eloquent\Model;

class Postcategory extends Model
{
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_id','name','slug','status'
    ];

    public function post()
    {
        return $this->hasMany('App\Models\Post','cat_id');
    }

    
}
