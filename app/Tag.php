<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded=[];
    public function news(){
        return $this->belongsTo(News::class,'new_id','id');
    }
}
