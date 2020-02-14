<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Book;
use App\Cart;
use App\Mail\BorrowSucessful;
use App\Mail\PurchaseSuccessful;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use App\Info;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class CartController extends Controller
{

    public function update(Request $request, Book $product)
    { {
            $request->validate([
                'qty' => 'required|numeric|min:1'
            ]);

            $cart = new Cart(session()->get('cart'));
            $cart->updateQty($product->id, $request->qty);
            session()->put('cart', $cart);
            return redirect()->route('cart.show')->with('toast_success', 'Product updated');
        }
    }

    public function destroy(Book $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);

        if ($cart->totalQty <= 0) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show')->with('toast_success', 'Product was removed');
    }

    public function addToCart(Book $product)
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart', $cart);
        return back()->with('toast_success', 'Product was added to cart');
    }

    public function showCart()
    {

        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        return view('cart.show', compact('cart'));
    }


    public function checkout($amount)
    {
        if (session()->has('cart')) {
            $cart = new Cart(session()->get('cart'));
        } else {
            $cart = null;
        }

        if ($amount != 0) {
            
            return view('cart.checkout',[
                'amount' => $amount,
                'cart' => $cart
            ]);
        } else {

            // Mail::to(auth::user()->email)->send(new BorrowSucessful());
            session()->forget('cart');

            return back();
        }
    }
    public function charge(Request $request)
    {

        $charge = Stripe::charges()->create([
            'currency' => 'EGP',
            'source' => $request->stripeToken,
            'amount'   => $request->amount,
            'description' => ' Test from laravel new app'
        ]);
        $chargeId = $charge['id'];

        if ($chargeId) {


            // save order in orders table ...

            auth()->user()->orders()->create([
                'cart' => serialize(session()->get('cart'))
            ]);

            $info = Info::create([
                'address' => $request->address,
                'postalCode' => $request->postal,
                'phone' => $request->phone,
                'user_id' => $request->user()->id
            ]);

            $info->save();



            session()->forget('cart');
            // Mail::to(auth::user()->email)->send(new PurchaseSuccessful());

            return redirect()->route('home')->with('toast_success', " Payment was done. Thanks");
        } else {
            return redirect()->back();
        }
    }

    public function generatePDF($amount)

    {
        if (session()->has('cart')) {
            
            $cart = new Cart(session()->get('cart'));
           
        } else {
            $cart = null;
        }
        $data=['amount'=> $amount,'cart'=>$cart
    ];
        
        $pdf = PDF::loadView('cart.invoice', compact('data'));
  
        return $pdf->download('invoice.pdf');
    }
}
