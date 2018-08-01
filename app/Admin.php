<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    protected $tabel = "tbl_admin";
    protected $fillable = ['admin_name','admin_email','admin_password','admin_phone'];

    

}
