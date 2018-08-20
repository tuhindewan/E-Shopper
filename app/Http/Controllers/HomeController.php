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

    public function product_by_category($category_id){
    	$categories = Category::getAllActiveCategories();
    	$manufactures = Manufacture::getAllActiveManufactures();
    	$products = Product::getAllProductsByCategoryId($category_id);
    	return view('pages.product_by_category')->with(compact('categories','manufactures','products'));
    }

    public function product_by_manufacture($manufacture_id){
    	$categories = Category::getAllActiveCategories();
    	$manufactures = Manufacture::getAllActiveManufactures();
    	$products = Product::getAllProductsByManufactureId($manufacture_id);
    	return view('pages.product_by_manufacture')->with(compact('categories','manufactures','products'));
    }
}
