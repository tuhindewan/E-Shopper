<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    protected $table = "tbl_products";
    protected $primaryKey = "product_id";
    protected $fillable = ['product_id','product_name','category_id','manufacture_id','product_short_description','product_long_description','product_price','product_image','product_size','product_color','publication_status'];

    public static function getAllProducts(){
    	return DB::table('tbl_products')->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')->get();
    }


}
