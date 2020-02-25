<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'shipping_info';
    protected $fillable = [
        'address', 'phone' , 'postalCode' , 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
