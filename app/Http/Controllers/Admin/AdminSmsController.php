<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class AdminSmsController extends Controller
{
    
   public function sms( ){
    Nexmo::message()->send([
        'to'   => '201069945283',
        'from' => 'esraa',
        'text' => 'hey, the borrow time will end soon'
    ]);
    return redirect()->back();
   }
}
