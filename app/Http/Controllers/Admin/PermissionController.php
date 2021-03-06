<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{
//    声明一个获取列表的方法
    public function index()
    {
//        读取所有数据
        $permissions=Permission::all();
//        显示视图
        return view("admin.permission.index",compact("permissions"));

    }
//添加权限
    public function add(Request $request)
    {
        //声明一个空数组用来装路由名字
//        $urls=[];
        //得到所有路由

        $routes =Route::getRoutes();
//dd($routes);
        //循环得到单个路由
        foreach ($routes as $route) {
            //判断命名空间是 后台的
            if ($route->action["namespace"]=="App\Http\Controllers\Admin"){
                //取别名存到$urls中
                $urls[]=$route->action['as'];
            }
        }
        //从数据库取出已经存在的
        $permission=Permission::pluck("name")->toArray();
        //已经存在的从$urls中去掉
        $urls=array_diff($urls,$permission);
        if ($request->isMethod("post")){
            $data=$request->post();
            $data['guard_name']="admin";

            Permission::create($data);
            return redirect()->refresh();
//            dd($data);
        }
return view("admin.permission.add",compact("urls"));
}





}
