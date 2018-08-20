<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use App\Admin;
use Illuminate\Support\Facades\Session;
session_start();
use App\Http\Traits\AuthCheck;

class AdminController extends Controller
{
   use AuthCheck;
   public function index(){
      $this->adminLoginCheck();
   	return view('admin.login');
   }


   public function admin_login(Request $request){
   		$admin_email 	= $request->admin_email;
   		$admin_password = md5($request->admin_password);
   		$result = DB::table('tbl_admin')->where('admin_email',$admin_email)
    								   ->where('admin_password',$admin_password)
    								   ->first();
   		
   		if ($result) {
   			Session::put('admin_name',$result->admin_name);
   			Session::put('admin_id',$result->admin_id);

   			return Redirect::to('/dashboard');
   		}else{
   			Session::put('message','Email or Password is invalid');

   			return Redirect::to('/admin');
   		}
   }

   
}
