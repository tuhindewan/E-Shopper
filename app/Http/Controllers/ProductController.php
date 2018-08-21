<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use Validator;
use App\Product;
use Session;
use Redirect;
use DB;

class ProductController extends Controller
{
    public function add_product(){
    	$categories = Category::getAllActiveCategories();
    	$manufactures = Manufacture::getAllActiveManufactures();
    	return view('admin.product.add_product')->with(compact('categories','manufactures'));
    }

    public function save_product(Request $request){
    	$input = $request->all();


    	if($request->hasfile('product_image')) 
    	{ 
    	  $file = $request->file('product_image');
    	  $extension = $file->getClientOriginalExtension(); // getting image extension
    	  $filename =time().'.'.$extension;
    	  $success = $file->move('images/product/'.'/'.date("Y/m/d").'/',$filename);
    	  if ($success) {
    	  		$input['product_image'] = 'images/product/'.'/'.date("Y/m/d").'/'. $filename;



    	  		DB::table('tbl_products')->insert($input);
    	  		Session::flash('success','Product has been added.');
    	  		return Redirect::to('/add_product');
    	  }
    	}
    }


    public function all_product(){
    	$products = Product::getAllProducts();
    	/*return $products;*/
    	return view('admin.product.all_product')->with(compact("products"));
    }

    public function inactive_product($product_id){
    	try {
    	    $result = Product::changeProductToInactive($product_id);
    	    $bag = 0;
    	} catch (Exception $e) {
    	    $bug = $e->errorInfo[1];
    	    $bug1 = $e->errorInfo[2];
    	}

    	if ($bag == 0) {
    	    Session::flash('success','Publication status has been changed to inactive.');
    	    return Redirect::to('/all_product');
    	}
    	
    }

    public function active_product($product_id){
        try {
            $result = Product::changeProductToActive($product_id);
            $bag = 0;
        } catch (Exception $e) {
            $bag = $e->errorInfo[1];
            $bag1 = $e->errorInfo[2];
        }

        if ($bag == 0) {
            Session::flash('success','Publication status has been changed to active.');
            return Redirect::to('/all_product');
        }
    }

    public function delete_product($product_id){
        
        try {
            $category = Product::findOrFail($product_id);
            $category->delete();
            $bug = 0;
        } catch (\Exception $e) {
            $bug = $e->errorInfo[1];
            $bug1 = $e->errorInfo[2];
        }

        if($bug == 0){
            return redirect()->back()->with('success','Product Deleted Successfully ');
        }elseif($bug == 1451){
                return redirect()->back()->with('error','This Product Id Used AnyWhere.');
            }else{
            return redirect()->back()->with('error','Something Error Found !, Please try again.'.$bug1);
        }
    }

    public  function product_details($product_id){
        $categories = Category::getAllActiveCategories();
        $manufactures = Manufacture::getAllActiveManufactures();
        $product = Product::getProductDetailsById($product_id);
        return view('pages.product_details')->with(compact('product','categories','manufactures'));
    }
}
