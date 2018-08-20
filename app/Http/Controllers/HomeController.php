<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;

class HomeController extends Controller
{
    public function index(){
    	$categories = Category::getAllActiveCategories();
    	$manufactures = Manufacture::getAllActiveManufactures();
    	$products = Product::getAllActiveProducts();
    	return view('pages.main_content')->with(compact('categories','manufactures','products'));
    }
}
