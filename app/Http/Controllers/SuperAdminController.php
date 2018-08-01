<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Redirect;

class SuperAdminController extends Controller
{
    public function logout(){
    	Session::flush();
    	return Redirect::to('/admin');
    }
}
