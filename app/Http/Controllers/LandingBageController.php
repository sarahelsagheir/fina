<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class LandingBageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::inRandomOrder()->take(10)->get();
        return view('welcome')->with('books',$books);
    }

  
}
