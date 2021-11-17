<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title','meta_description','meta_keywords','about','email','phone','hotline','address','web_link','fb_link','twitter_link','instagram_link','youtube_link','service_years','total_patients','total_doctors','total_staffs','notice','terms','privacy','logo','favicon','cover_image'
    ];
}
