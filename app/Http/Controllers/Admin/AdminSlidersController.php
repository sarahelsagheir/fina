<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminSlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($file = $request->file('banner')){
            $name = time() . $file->getClientOriginalName();
            $file->move('sliders', $name);
            $input['banner'] = $name;
        }

        Slider::create($input);

        Session::flash('slider_added', 'Slider Added Successfully.');

        return redirect()->back();
    }

    /**
    *
    *
    *
    */

    public function deleteSlider(Request $request){
        $sliders = Slider::findOrFail($request->checkBoxArray);
        foreach ($sliders as $slider) {
            unlink(public_path() . $slider->banner);
            $slider->delete();
        }
        return redirect()->back();
    }
}
