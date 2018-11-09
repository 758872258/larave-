<?php
namespace App\Http\Controllers\Admin;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mockery\Matcher\Closure;

class BaseController extends Controller
{
    public function __construct()
    {
        //1.添加中间件 auth:admin
      $this->middleware("auth:admin")->except(["login"]);
        //2. 有没有权限
        $this->middleware(function ($request, \Closure $next){
            //如果没有权限  停在这里Closure
            //1. 得到当前访问地址的路由
            $route=Route::currentRouteName();
            //2.设置一个白名单
            $allow=[
                "admin.admin.login",

            ];
            //要保证在白名单 并且 有权限 而且 Id==10
            if (!in_array($route,$allow) &&!Auth::guard("admin")->user()->can($route) && Auth::guard("admin")->id()!=9){
                exit(view("admin.admin.fuck"));
            }
            return $next($request);

        });

    }

}





