<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;

class HomeController extends Controller
{
    public function index(){
    	$categories = Category::getAllActiveCategories();
    	$manufactures = Manufacture::getAllActiveManufactures();
    	return view('pages.main_content')->with(compact('categories','manufactures'));
    }
}
