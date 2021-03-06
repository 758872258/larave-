<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{

    use HasRoles;
    protected $guard_name ='admin'; // 使用任何你想要的守卫

    public $fillable=["name","email","password","remember_token",];
}
