<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Postcategory;

class Post extends Model
{
    protected $primaryKey = 'post_id';
    protected $fillable = [
        'post_id','cat_id','title','slug','body','keywords','image','status'
    ];

    public function postcategory()
    {
        return $this->belongsTo('App\Models\Postcategory','cat_id');
    }
}
