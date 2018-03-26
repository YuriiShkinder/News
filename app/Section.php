<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\News;

class Section extends Model
{
    protected $guarded=[];
    public function new(){
        return $this->hasOne(News::class);
    }
}
