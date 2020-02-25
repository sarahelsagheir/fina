<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('chat.index');
    }

    public function search(Request $request)
    {
    	if($request->has('search')){
    		$products = Book::search($request->get('search'))->get();	
    	}else{
    		$products = Book::get();
    	}


    	return view('results', compact('products'));
    }
}
