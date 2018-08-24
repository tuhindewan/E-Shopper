<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
    protected $table = "tbl_users";
    protected $primaryKey = "customer_id";

	public static function saveCustomer($data){
		return DB::table('tbl_users')->insertGetId($data);
	}
}
