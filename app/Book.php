<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   


    protected $casts = [

        "headings" => "array",
        "stories" => "array"
        
    ];

    
}
