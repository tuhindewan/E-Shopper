<?php
namespace App\Http\Traits;
use Session;
use Redirect;


trait AuthCheck {
    public function adminAuthCheck(){
    	$logged_id = Session::get('admin_id');
    	if ($logged_id) {
    		return true;
    	}else{
    		return Redirect::to('/admin')->send();
    	}
    }

    public function adminLoginCheck(){
       $logged_id = Session::get('admin_id');
       if ($logged_id) {
          return Redirect::to('/dashboard')->send();
       }
    }
}