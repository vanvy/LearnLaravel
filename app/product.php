<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $table = "product";
    // public $timestamps = false;

    public function category() 
    {
        return $this->belongsto('App\category','id_category','id');
    }
}
