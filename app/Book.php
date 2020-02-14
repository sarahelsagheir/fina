<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commentable;
use Nicolaslopezj\Searchable\SearchableTrait;


class Book extends Model
{
    use Notifiable, Commentable, SearchableTrait;

     /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'books.title' => 10,
            'books.author' => 10,
            'books.category' => 5,
            'books.price' => 3,
        ]
    ];

    protected $fillable = [
        'title', 'author', 'price','category','status', 'cover','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
     }
   
     public function borrower()
     {
         return $this->belongsTo('App\borrower');
     }
 
}
