<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Borrower extends Model
{
    protected $fillable = ['book_id','user_id' ,'issue_interval'];
        public function user() {
        
        return $this->belongsTo('App\User');
    }
    public function book()
    {

      return $this->belongsTo('App\Book');

    }

    public function status()
    {
        $today = Carbon::today();
        $issued = Carbon::parse($this->created_at);
        $issue_interval = DB::table('borrowers')->get()->first()->issue_interval;
        $days_left = $issue_interval - $today->diffInDays($issued);
       
        return $days_left;
    }

}
