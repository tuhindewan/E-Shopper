<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use Redirect;
use DB;
use Cart;

class CheckoutController extends Controller
{
    public function user_login_check(){
    	return view('pages.login');
    }

    public function customer_registration(Request $request){
    	$input = $request->all();
    	$data = array();
    	$data['password'] = md5($input['customer_password']);
    	$data['user_name'] = $input['customer_name'];
    	$data['email'] = $input['customer_email'];
    	$data['phone'] = $input['customer_phone'];
    	$user_id = Customer::saveCustomer($data);

    	if ($user_id) {
    		Session::put('customer_id',$user_id);
    		Session::put('customer_name',$input['customer_name']);
    	}

    	return Redirect::to('/checkout');
    }

    public function checkout(){
    	return view('pages.checkout');
    }

    public function customer_logout(){
    	Session::flush();
    	return Redirect::to('/');
    }

    public function customer_login(Request $request){
		$customer_email 	= $request->customer_email;
		$customer_password = md5($request->customer_password);
		$result = DB::table('tbl_users')->where('email',$customer_email)
 								   ->where('password',$customer_password)
 								   ->first();
		
		if ($result) {
			Session::put('customer_name',$result->user_name);
			Session::put('customer_id',$result->user_id);

			return Redirect::to('/');
		}else{
			Session::put('message','Email or Password is invalid');

			return Redirect::to('/');
		}
    }

    public function save_shipping_details(Request $request){
    	$input = $request->all();
    	$shipping_id = DB::table('tbl_shipping')->insertGetId($input);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect::to('/payment');
    }

    public function payment(){
    	return view('pages.payment');
    }

    public function save_payment_gateway(Request $request){
    	$payment_gateway = $request->payment_gateway;
    	$paymentData = array();
    	$paymentData['payment_method'] = $payment_gateway;
    	$paymentData['payment_status'] = "pending";
    	$payment_id  = DB::table('tbl_payment')->insertGetId($paymentData);

    	$orderData = array();
    	$orderData['customer_id'] = Session::get('customer_id');
    	$orderData['shipping_id'] = Session::get('shipping_id');
    	$orderData['payment_id']  = $payment_id;
    	$orderData['order_total'] = Cart::total();
    	$orderData['order_status'] = "pending";
    	$order_id = DB::table('tbl_order')->insertGetId($orderData);

    	$contents = Cart::content();
    	$orderDData = array();
    	foreach ($contents as $content) {
    		$orderDData['order_id'] = $order_id;
    		$orderDData['product_id'] = $content->id;
    		$orderDData['product_name'] = $content->name;
    		$orderDData['product_price'] = $content->price;
    		$orderDData['product_sales_quantity'] = $content->qty;
    		$result = DB::table('tbl_order_details')->insert($orderDData);
    	}

    	if ($payment_gateway == "handcash") {
    			Cart::destroy();
    			return view('pages.handcash');
    		}	
    }

    public function manage_order(){
        $orders = DB::table('tbl_order')->join('tbl_users', 'tbl_order.customer_id', '=', 'tbl_users.user_id')->select('tbl_order.*','tbl_users.user_name')->get();
        return view('admin.order.manage_order')->with(compact('orders'));
    }
}
