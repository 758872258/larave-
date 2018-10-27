<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public  $fillable=["name","email","password"];
    public function shop()
    {
        return $this->hasOne(Shops::class,"user_id");
    }

}
