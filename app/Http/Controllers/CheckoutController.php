<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;
use Redirect;

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
    	$customer_id = Customer::saveCustomer($data);

    	Session::put('customer_id',$request->customer_id);
    	Session::put('customer_name',$request->customer_name);

    	return Redirect::to('/checkout');
    }

    public function checkout(){
    	return view('pages.checkout');
    }
}
