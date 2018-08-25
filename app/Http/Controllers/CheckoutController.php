<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use Redirect;
use DB;

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
    	$shipping_id = Session::get('shipping_id');
    	$customer_id = Session::get('customer_id');
    	return $customer_id;
    }
}
