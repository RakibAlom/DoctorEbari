<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $primaryKey = 'shop_id';
    protected $fillable = [
        'shop_id','name','slug','category','code','sell_price','buy_price','details','image','keywords','status'
    ];
}
