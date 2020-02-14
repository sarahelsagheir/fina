<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreBookRequest;
use App\Book;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function changePasswordForm(){
        return view('changePassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'your current password does not match');
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'your new password cannot be the same wirh your current password');
        }
        $request->validate([
            'current_password' => 'required',
            'new_password'    => 'required|string|min:8',
            'new_confirm_password' => ['same:new_password'],
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('toast_success', 'password changed successfully');
    }

    public function getBookForm(){
        return view('addBook');
    }

    public function addBook(StoreBookRequest $request){
        if (request()->has('cover')) {
            $cover = request()->file('cover');
            $cover_name = time() . '.' . $cover->getClientOriginalExtension();
            $cover_path = public_path('images/');
            $cover->move($cover_path, $cover_name);

            $books = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'price' => 0,
                'category' => $request->category,
                'status' => true,
                'cover' => 'images/' . $cover_name,
                'user_id' => $request->user()->id
            ]);

            $books->save();
            return redirect(route('books'))->with('toast_success', 'Thanks For Sharing');
        } elseif(!request()->has('cover')) {
            $books = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'price' => 0,
                'category' => $request->category,
                'status' => true,
                'user_id' => $request->user()->id
            ]);

            $books->save();
            return redirect(route('books'))->with('toast_success', 'Thanks For Sharing');
        }else{
            return back()->with('toast_error', 'something went rong please try again');

        }
    }

    public function getBooks(){
        $books = book::where('user_id', '=', auth()->user()->id)->get();
        return view('Books', [
            'books' => $books
        ]);
    }
    public function deleteBook($id){
        $books = Book::find($id);
        //delete
        $books->delete();
        return back();
    }



    public function getProfileAvatar()
    {
        return view('profilePicture');
    }


    public function profilePictureUpload(Request $request)
    {
        $this->validate($request, [
            'cover' => 'sometimes|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if (request()->has('cover')) {
            $cover = request()->file('cover');
            $cover_name = time() . '.' . $cover->getClientOriginalExtension();
            $cover_path = public_path('images/');
            $cover->move($cover_path, $cover_name);
            $user = Auth::user();
            $user->cover = 'images/' . $cover_name;
            $user->save();
            return back()->with('toast_success', 'Profile Picture Uploaded Successfully');
        }
        else{
            return back()->with('toast_error', 'something went rong please try again');
        }
        
    }
}
