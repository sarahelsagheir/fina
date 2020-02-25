<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{


    protected $fillable = [
        'title'
    ];

    public function book(){
        return $this->hasMany('App\Book');
    }
}
