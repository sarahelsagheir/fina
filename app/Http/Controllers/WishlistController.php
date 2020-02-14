<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Book;
use App\Wishlist;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);
        return view('wishlist', compact('user', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'user_id'=>'required',
            'product_id' =>'required',
           ));
           
           $status=Wishlist::where('user_id',Auth::user()->id)
           ->where('book_id',$request->product_id)
           ->first();
           
           if(isset($status->user_id) and isset($request->product_id))
              {
                  return redirect()->back()->with('toast_success', 'This item is already in your 
                  wishlist!');
              }
              else
              {
                  $wishlist = new Wishlist;
           
                  $wishlist->user_id = $request->user_id;
                  $wishlist->book_id = $request->product_id;
                  $wishlist->save();
           
                  return redirect()->back()->with('toast_success',
                                $wishlist->book->title.' Added to your wishlist.');
              }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
      $wishlist->delete();

      return redirect()->route('wishlist.index')
          ->with('toast_success',
           'Item successfully deleted');
    }
}
