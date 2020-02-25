<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Book;
use App\Borrower;
use App\Order;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Stripe\Api\Orders;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
	{
		$users =     User::all();
		$books =     Book::all();
		$borrowers = Borrower::all();
        $orders =    Order::all();
        return view('admin.index', compact('users', 'books','borrowers', 'orders'));
    }


    public function getBooksRation(){
        $categories = Category::all();
        // $books = Book::all();
        //$cat = json_decode($cat);
        $array1 = [];
        $array2 = [];
        foreach($categories as $category){
            array_push($array1, $category->title);
            array_push($array2, $category->book()->count());
        }
        $array = ['label' => $array1, 'data' => $array2];
        
        return $array;
    }

    public function getOrdersRation(){
        $categories = Category::all();
        $array1 = [];
        $array2 = [];
        foreach ($categories as $category) {
            $orders = Book::where('category_id', $category->id)->pluck('price');
            $sum = 0;
            foreach($orders as $order){
                $sum += $order;
            }
            array_push($array1, $category->title);
            array_push($array2, $sum);
        }
        $array = ['label' => $array1, 'data' => $array2];

        return $array;
    }
 

   
    public function search(Request $request)
    {

        $request->validate([

            'q' => 'required'
        ]);
        $q = $request->q;

        $filteredBooks = Book::where('title', 'like', '%' . $q . '%')
            ->orWhere('price', 'like', '%' . $q . '%')
            ->get();
        if ($filteredBooks->count()) {

            return view('admin.search.searchBooks')->with([
                'books' =>  $filteredBooks
            ]);
        } else {
            Session::flash('search', ' faild.');

            return view('admin.search.searchBooks')->with([
                'status', "search failed ,, please try again"
            ]);
        }
    }



  
}
