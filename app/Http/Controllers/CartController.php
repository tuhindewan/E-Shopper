<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacture;
use App\Category;
use Cart;
use Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
    	$input = $request->all();
    	$quantity = $input['quantity'];
    	$product_id = $input['product_id'];
    	$pro_info = Product::findOrFail($product_id);

    	$data['id'] = $pro_info['product_id'];
    	$data['name'] = $pro_info['product_name'];
    	$data['qty'] = $quantity;
    	$data['price'] = $pro_info['product_price'];
    	$data['options']['image'] = $pro_info['product_image'];
    	Cart::add($data);

        return Redirect::to('/show_cart');

        
    
    }


    public function show_cart(){
            $categories = Category::getAllActiveCategories();
            $manufactures = Manufacture::getAllActiveManufactures();

            return view('pages.add_to_cart')->with(compact('data','categories','manufactures'));
    }

    public function delete_cart_item($rowId){
        Cart::remove($rowId);
        return Redirect::to('show_cart');
    }

    public function update_cart_item(Request $request){
        $qty = $request->qty;
        $rowId = $request->rowId;
        Cart::update($rowId,$qty);

        return Redirect::to('/show_cart');

    }
}
