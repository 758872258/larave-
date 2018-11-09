<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleController extends BaseController
{
//    获取权限名列表
    public function index()
    {
//        获取所有数据
$roles=Role::all();
//显示视图
return view("admin.role.index",compact("roles"));


    }

//添加角色
    public function add(Request $request)
    {
        if ($request->isMethod("post")) {
            //接收参数 并处理数据
            $permission = $request->post('permission');
            //添加角色
            $role = Role::create([
                "name" => $request->post("name"),
                "guard_name" => "admin"
            ]);
            //给角色同步权限
            if ($permission) {
                $role->syncPermissions($permission);
            }
        }
        //得到所有权限
        $permissions = Permission::all();
        return view("admin.role.add",compact("role","permissions"));

    }
}
