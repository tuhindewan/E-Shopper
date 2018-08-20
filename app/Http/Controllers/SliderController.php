<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Redirect;
use Session;
use DB;

class SliderController extends Controller
{
    public function add_slider(){
    	return view('admin.slider.add_slider');
    }

    public function save_slider(Request $request){
    	$input = $request->all();

    	if($request->hasfile('slider_image')) 
    	{ 
    	  $file = $request->file('slider_image');
    	  $extension = $file->getClientOriginalExtension(); // getting image extension
    	  $filename =time().'.'.$extension;
    	  $success = $file->move('images/slider/'.'/'.date("Y/m/d").'/',$filename);
    	  if ($success) {
    	  		$input['slider_image'] = 'images/slider/'.'/'.date("Y/m/d").'/'. $filename;

    	  		DB::table('tbl_slider')->insert($input);
    	  		Session::flash('success','Slider has been added.');
    	  		return Redirect::to('/add_slider');
    	  }
    	}
    }

    public function all_slider(){
    	$sliders = Slider::all();
    	return view('admin.slider.all_slider')->with(compact('sliders'));
    }
}
