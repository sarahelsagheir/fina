<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title', 'banner'
    ];

    protected $sliders_location = '/sliders/';

    public function getBannerAttribute($photo){
    	return $this->sliders_location . $photo;
    }
}
