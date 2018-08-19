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
}
