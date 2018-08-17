<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Manufacture;
use Session;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
{
    public function add_manufacture(){
    	return view('admin.manufacture.add_manufacture');
    }

    public function save_manufacture(Request $request){
    	$validator = Validator::make($request->all(),[
    	    'manufacture_name'=>'required|string|max:20',
    	    'manufacture_description'=>'required|string|max:50'
    	]);

    	if ($validator->fails()) {

    	    return redirect()->back()->withErrors($validator);
    	}

    	$manufacture = new Manufacture;

    	$manufacture->manufacture_name = $request->manufacture_name;
    	$manufacture->manufacture_description = $request->manufacture_description;
    	$manufacture->publication_status = $request->publication_status;

    	$manufacture->save();

    	Session::flash('success','Manufacture has been added.');
    	return Redirect::to('/add_manufacture');

    }

    public function all_manufacture(){
    	$manufactures = Manufacture::all();
    	return view('admin.manufacture.all_manufacture')->with(compact('manufactures'));
    }

    public function inactive_manufacture($manufacture_id){
    	try {
    	    $result = Manufacture::changeManufactureToInactive($manufacture_id);
    	    $bag = 0;
    	} catch (Exception $e) {
    	    $bug = $e->errorInfo[1];
    	    $bug1 = $e->errorInfo[2];
    	}

    	if ($bag == 0) {
    	    Session::flash('success','Publication status has been changed to inactive.');
    	    return Redirect::to('/all_manufacture');
    	}
    }

    public function active_manufacture($manufacture_id){
        try {
            $result = Manufacture::changeManufactureToActive($manufacture_id);
            $bag = 0;
        } catch (Exception $e) {
            $bag = $e->errorInfo[1];
            $bag1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Publication status has been changed to active.');
            return Redirect::to('/all_manufacture');
        }
    }

    public function edit_manufacture($manufacture_id){
        $data = Manufacture::find($manufacture_id);
        return view('admin.manufacture.edit_manufacture')->with(compact('data'));
    }

    public function update_manufacture(Request $request,$manufacture_id){
        $validator = Validator::make($request->all(),[
            'manufacture_name'=>'required|string|max:20',
            'manufacture_description'=>'required|string|max:50'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();

        try {
            $result = Manufacture::updateManufactureById($input,$manufacture_id);
            $bag = 0;
        } catch (Exception $e) {
            $bag = $e->errorInfo[1];
            $bag1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Manufacture updated successfully');
            return redirect()->back();
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Manufacture Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }

    public function delete_manufacture($manufacture_id){
        
        try {
            $manufacture = Manufacture::findOrFail($manufacture_id);
            $manufacture->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }

        if($bug == 0){
            return redirect()->back()->with('success','Manufacture Deleted Successfully ');
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Manufacture Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }
}
