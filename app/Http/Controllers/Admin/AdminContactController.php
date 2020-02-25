<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Support\Facades\Session;


class AdminContactController extends Controller
{
    public function index()
	{
        $messages = Contact::paginate(10);
        return view('admin.contact_us', compact('messages'));
    }


    public function delete(Request $request)
    {
        $messages = Contact::findOrFail($request->checkBoxArray);
        foreach ($messages as $message) {
            
            $message->delete();
        }
        return redirect()->back();
    }


    public function store(Request $request)
    {
        Contact::create($request->all());
        
        return redirect()->back();
    }

}
