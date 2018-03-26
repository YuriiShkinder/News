<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded=[];
     public function coment(){

         return $this->belongsTo(Coment::class);
     }

}
