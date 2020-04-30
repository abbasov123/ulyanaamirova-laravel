<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $casts = [

        "blog_imgs" => "array"
           
    ];
    
}
