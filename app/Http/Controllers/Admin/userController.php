<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends BaseController
{
    public  function  index(){
//        获取所有数据
        $users=User::all();
//        显示视图
        return view("admin.user.index",compact("users"));

    }
//    编辑商户
public  function  edit(Request $request,$id){
//        获取一条数据
        $users=User::find($id);
        if ($request->isMethod("post")){


            // 验证
            $data = $this -> validate($request,[
                'name' => "required",
                'password' => "required",
                'email' => "required",
            ]);
//            拿到数据执行修改方法
            if ($users->update($data)){
//                跳转视图
                return redirect()->route("admin.user.index")->with("success","修改成功");
            }
        }
//        显示自己的页面

    return view("admin.user.edit",compact("users"));
}
public  function del($id){
//        读取一条数据
    $user=User::find($id);
//    拿到id执行删除方法
    if ($user->delete()){

      return redirect()->route("admin.user.index")->with("success","删除成功");

    }



}

}
