<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Section;
use App\Category;
class News extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    //protected $dateFormat = 'Y-M-d H:i:s';
    protected $guarded=[];
    protected $table='news';
    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function tags(){
        return $this->hasMany(Tag::class,'new_id','id');
    }

    public function coments(){
        return $this->hasMany(Coment::class,'new_id');
    }

}
