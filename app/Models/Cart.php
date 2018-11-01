<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public  $fillable=["goods_id","user_id","goods_count"];
}
