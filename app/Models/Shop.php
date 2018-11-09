<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Shop extends Authenticatable
{
    public  $fillable=["shop_category_id","shop_name","shop_img","shop_rating","brand","on_time","fengniao","bao","piao","zhun","start_send","send_cost","notice","discount","status","user_id",];

public  function  user(){
    return $this->belongsTo(User::class,"user_id");


}

}

