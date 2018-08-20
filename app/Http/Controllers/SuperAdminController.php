<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;
use App\Http\Traits\AuthCheck;

class SuperAdminController extends Controller
{
	use AuthCheck;
	public function index(){
		$this->adminAuthCheck();
		return view('admin.dashboard');
	}

    public function logout(){
    	Session::flush();
    	return Redirect::to('/admin');
    }

    
}
