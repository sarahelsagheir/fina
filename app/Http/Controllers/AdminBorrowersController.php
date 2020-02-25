<?php

namespace App\Http\Controllers;
use App\Borrower;
use Illuminate\Http\Request;

class AdminBorrowersController extends Controller
{
    public function borrower(){
        $borrowers = Borrower::all();
        return view('admin.borrowers.index',compact('borrowers'));
    }}
