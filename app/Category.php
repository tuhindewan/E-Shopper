<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    protected $table = "tbl_category";
    protected $primaryKey = "category_id";

    public static function changeCategoryToInactive($category_id){
    	return DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
    }


    public static function changeCategoryToActive($category_id){
    	return DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
    }


    public static function updateCategoryById($input,$category_id){
    	return DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update([
    			'category_name'=>$input['category_name'],
    			'category_description'=>$input['category_description']
    		]);
    }
}
