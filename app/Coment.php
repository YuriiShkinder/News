<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $guarded=[];

    public function new(){
        return $this->belongsTo(News::class);
    }
    public function user(){
        return $this->belongsTo(User::class);

    }

    public function likes(){
        return $this->hasMany(Like::class,'coment_id');
    }
}
