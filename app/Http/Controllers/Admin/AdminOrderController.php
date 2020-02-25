<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class AdminOrderController extends Controller
{

    public function index(){
        return view('admin.order.index');
    }


    public function order(Request $request)
    {
        $id=$request->order;
        $orders = \App\Order::where('id' , $id)->get();
        // dd($orders);
        $carts = $orders->transform( function( $cart, $key) {
            return unserialize($cart->cart);
        });
        //dd($carts);
        return view('admin.order.search')->with('carts', $carts);

    }

}
