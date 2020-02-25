<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commenter;
use willvincent\Rateable\Rateable;
use Laratrust\Traits\LaratrustUserTrait;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;


class User extends Authenticatable implements BannableContract
{
    use Bannable;

    use LaratrustUserTrait;
    use Notifiable, Commenter, Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cover' , 'email_verified_at', 'banned_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function book()
    {
        return $this->hasMany('App\Book');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function info() {
        return $this->hasOne('App\Info');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }


}
