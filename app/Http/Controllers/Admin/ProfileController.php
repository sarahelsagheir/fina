<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile', compact('user'));
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        if($user->id != Auth::id()){
            return view('errors.404');
        }
       

        return view('admin.profile-edit', compact('user'));
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
        $user = User::findOrFail($id);

        if($file = $request->file('avatar')){
            $name = time() . $file->getClientOriginalName();
            $file->move('customers', $name);
            
            if(is_file(public_path() . $user->avatar)){
                unlink(public_path() . $user->avatar);
            }
          
            $input['avatar'] = $name;
        }

        $input['password'] = bcrypt($request->get('password'));

        $user->update($input);

        Session::flash('user_updated', 'Updated Successfully.');

        return view('admin.profile', compact('user'));

    }


}
