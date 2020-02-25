<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Support\Facades\Session\Auth;
use App\Role;
use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class AdminUserController extends Controller 
{
    use Bannable;

    public function shouldApplyBannedAtScope()
    {
        return true;
    }

    public function create()
    {
        return view('admin.users.createBookStore');
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users'
        ]);

        if (request()->has('cover')) {
            $cover = request()->file('cover');
            $cover_name = time() . '.' . $cover->getClientOriginalExtension();
            $cover_path = public_path('coverpages/');
            $cover->move($cover_path, $cover_name);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->cover = $request->cover;
            $user->save();
            $user->attachRole('book_store');
        } else {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->attachRole('book_store');
        }

        $users = User::paginate(20);
        Session::flash('Store_added', 'bookStore Added Successfully.');

        return redirect()->back();
    }

      public function ban(Request $request, $id)

    {
        $user = User::where('id', $id)->first();
        if (!empty($user)) {
            $user->ban();
        }
        $users = User::orderBy('id')->withBanned()->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    public function revoke(Request $request, $id)

    {
        $user = User::onlyBanned()->where('id', $id)->first();
        if (!empty($user)) {
            $user->unban();
        }
        $users = User::orderBy('id')->withBanned()->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }



    public function users()
    {
        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }


   


    public function delete(Request $request)
    {
        $users = User::findOrFail($request->checkBoxArray);
        foreach ($users as $user) {
            if (is_file(public_path() . $user->cover)) {
                unlink(public_path() . $user->cover);
            }
            $user->delete();
        }
        return redirect()->back();
    }



    public function userSearch(Request $request){
        
        if($request->has('search')){
            $users =User::search($request->get('search'))->get();
            dd($users);

        }
        else{

            $users = User::get();

        }
        return view('admin.users.searchUser',compact('users'));
    }
}
