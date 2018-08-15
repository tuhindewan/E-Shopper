<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
use Validator;
use Illuminate\Support\Facades\Redirect;
class CategoryController extends Controller
{
    public function index(){
    	return view('admin.category.add_category');
    }


    public function all_category(){
    	$data = Category::all();
    	return view('admin.category.all_category')->with(compact('data'));
    }

    public function save_category(Request $request){

        $this->validate($request,[
            'category_name'=>'required|string|max:20',
            'category_description'=>'required|string|max:50'
        ]);
        
    	$category = new Category;

    	$category->category_name = $request->category_name;
    	$category->category_description = $request->category_description;
    	$category->publication_status = $request->publication_status;

    	$category->save();

    	Session::flash('success','Category has been added.');
    	return Redirect::to('/add_category');
    }

    public function inactive_category($category_id){

        try {
            $result = Category::changeCategoryToInactive($category_id);
            $bag = 0;
        } catch (Exception $e) {
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Publication status has been changed to inactive.');
            return Redirect::to('/all_category');
        }
        
        
        
    }


    public function active_category($category_id){
        try {
            $result = Category::changeCategoryToActive($category_id);
            $bag = 0;
        } catch (Exception $e) {
            $bag = $e->errorInfo[1];
            $bag1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Publication status has been changed to active.');
            return Redirect::to('/all_category');
        }
    }


    public function edit_category($category_id){
        $data = Category::find($category_id);
        return view('admin.category.edit_category')->with(compact('data'));
    }


    public function update_category(Request $request,$category_id){
        $validator = Validator::make($request->all(),[
            'category_name'=>'required|string|max:20',
            'category_description'=>'required|string|max:50'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        }

        $input = $request->all();

        try {
            $result = Category::updateCategoryById($input,$category_id);
            $bag = 0;
        } catch (Exception $e) {
            $bag = $e->errorInfo[1];
            $bag1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Category updated successfully');
            return redirect()->back();
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Category Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }


    public function delete_category($category_id){
        
        try {
            $category = Category::findOrFail($category_id);
            $category->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }

        if($bug == 0){
            return redirect()->back()->with('success','Category Deleted Successfully ');
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Announcement Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }
}
