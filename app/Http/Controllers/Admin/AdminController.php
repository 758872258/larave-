<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends BaseController
{
    public function index(){
//        获取所有数据
        $admins=Admin::all();

//        显示视图
        return view("admin.admin.index",compact("admins"));
    }
    //管理员注册
    public  function register(Request $request){
//        判断提交方式
        if ($request->isMethod("post")){
//           存储数据
            $data=$request->post();
            $data['password'] = bcrypt($data['password']);
//         dd($data);
//         执行方法
            if (Admin::create($data)){
//跳转视图

                return redirect()->route("admin.admin.login");
            }
        }
        //显示自己的页面
        return view("admin.admin.register");
    }
//    管理员登陆
    public function login(Request $request){
        // 判断是否 post 提交
        if ($request -> isMethod("post")){
            // 验证
            $data = $this -> validate($request,[
                'name' => "required",
                'password' => "required",
            ]);
            // 验证账号密码
            if (Auth::guard("admin")-> attempt($data)){
                return redirect()->route("admin.admin.index")->with("success","登录成功");
            }else{
                return redirect()->back()->withInput()->with("danger","账号或密码错误");
            }
        }
        return view("admin.admin.login");
    }

//    管理员添加方法
public  function  add(Request $request){
//        判定提交方式
        if ($request->isMethod("post")){
            $data=$request->post();

//            拿到数据执行添加方法
            if (Admin::create($data)){
                //            跳转视图
                return redirect()->route("admin.admin.index");
            }
        }
        return view("admin.admin.add");
}
//管理员修改方法
public  function edit(Request $request,$id){
//        读取一条数据
        $admin=Admin::find($id);
//判定提交方式
    if ($request->isMethod("post")){

        $data=$request->post();
//        执行修改方法
        if ($admin->update($data)){
            return redirect()->route("admin.admin.index");
        }
    }
    return view("admin.admin.edit",compact("admin"));
}
//管理员删除方法
public  function  del($id){
//    读取一条数据
        $admin=Admin::find($id);

        if ($admin->delete()){
            return redirect()->route("admin.admin.index");

        }
}
}

