<?php

namespace App\Http\Controllers\Shop;



use App\Http\Controllers\Shop\BaseController;
use App\Models\User;
use function Couchbase\defaultDecoder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class UserController extends BaseController
{

    //    声明一个商家首页的方法
    public  function  index(){
//       获取所有数据
        $users=User::all();

//        返回视图
        return view("shop.user.index",compact("users"));

    }

//商户注册
    public  function register(Request $request){
//        判断提交方式
       if ($request->isMethod("post")){
//           存储数据
         $data=$request->post();
           $data['password'] = bcrypt($data['password']);
//         dd($data);
//         执行方法
         if (User::create($data)){
//跳转视图

             return redirect()->route("shop.user.login");
         }
       }
        //显示自己的页面
        return view("shop.user.register");
    }

//商户登录

    public function login(Request $request){
        // 判断是否 post 提交
        if ($request -> isMethod("post")){
            // 验证
            $data = $this -> validate($request,[
                'name' => "required",
                'password' => "required",
            ]);
            // 验证账号密码
            if (Auth::attempt($data)){
                return redirect()->route("shop.user.home")->with("success","登录成功");
            }else{
                return redirect()->back()->withInput()->with("danger","账号或密码错误");
            }
        }
        return view("shop.user.login");
    }

public  function home(){

        return view("shop.user.home");
}


    public  function  cat(){
    return view("shop.user.cat");
}



}
