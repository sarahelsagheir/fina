<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {   

        if(request()->has('category')){
            $book = book::where('category_id' ,'=',request('category'))->paginate(5)->appends([
                'category'=> request('category')
             ]);;
        }else{
            $book = Book::where('price','!=',0)->paginate(9);
        }


        // $books = Book::inRandomOrder()->take(4)->get();
        $category = \App\Category::all();

        return view('/home', [
            'books' => $book,
            'category' => $category
        ]);
    }

    public function view($id)
    {
        $book = Book::find($id);
        return view('view', [
            'book' => $book
        ]);
    }

   
  





}
