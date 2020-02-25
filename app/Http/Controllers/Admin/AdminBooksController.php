<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Borrower;
use App\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(20);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();

        return view('admin.books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);

        $input = $request->all();
        $input['user_id'] = $request->user()->id;


       
        if($file = $request->file('cover')){
            $name = time() . $file->getClientOriginalName();
            $file->move('coverpages', $name);
            $input['cover'] = $name;
        }
        Book::create($input);
        Session::flash('book_added', 'Book Added Successfully.');

        return redirect()->back();
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::pluck('title', 'id')->all();

        return view('admin.books.edit', compact('book', 'writers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $book = Book::findOrFail($id);

        if($file = $request->file('cover')){
            $name = time() . $file->getClientOriginalName();
            $file->move('coverpages', $name);
            $input['cover'] = $name;
        }


        $book->update($input);

        Session::flash('book_updated', 'Updated Successfully.');

        return redirect('admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $book = Book::find($book);
        $book->delete();
        return redirect()->route('book.index');
    }

    protected function validateData(Request $request)
    {
        $request->validate(
            [
                'description' => 'required'
            ],
            [
                'description.required'  => 'Please provide Book\'s description',

            ]
        );
    }
    public function show($book)
    {
        $book = Book::find($book);
        return view('admin.books.book-details', compact('book'));
    }


    public function delete(Request $request)
    {
        $books = Book::findOrFail($request->checkBoxArray);
        foreach ($books as $book) {
            if (is_file(public_path() . $book->cover)) {
                unlink(public_path() . $book->cover);
            }
            $book->delete();
        }
        return redirect()->back();
    }



    public function borrower()
    {
        $borrowers = Borrower::all();
        return view('admin.borrowers.index', compact('borrowers'));
    }
}
