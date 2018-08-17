<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Manufacture extends Model
{
    protected $table = "tbl_manufacture";
    protected $primaryKey = "manufacture_id";

    public static function changeManufactureToInactive($manufacture_id){
    	return DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 0]);
    }

    public static function changeManufactureToActive($manufacture_id){
    	return DB::table('tbl_manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 1]);
    }

    public static function updateManufactureById($input,$manufacture_id){
    	return DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->update([
    			'manufacture_name'=>$input['manufacture_name'],
    			'manufacture_description'=>$input['manufacture_description']
    		]);
    }

    public static function getAllActiveManufactures(){
        return DB::table('tbl_manufacture')
            ->where('publication_status',1)
            ->get();
    }
}
