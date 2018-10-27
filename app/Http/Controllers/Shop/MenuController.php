<?php

namespace App\Http\Controllers\Shop;

use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenuController extends BaseController
{
    public  function  index(){
//        读取所有数据
        $menus=Menu::all();
//        显示视图
        return view("shop.menu.index",compact("menus"));
    }
    public  function add(Request $request){
//        判定提交方式
        if ($request->isMethod("post")){
//            储存数据
            $data=$request->post();
            $data['goods_img']=$request->file("goods_img")->store("images");
//            $data['shop_id']=Auth::user()->shop->id;
//            dd( $data['shop_id']);
//            拿到数据执行添加方法
            if (Menu::create($data)){
//                跳转视图
                return redirect()->route("shop.menu.index")->with("success","添加成功");
            }
        }
        $menucategorys=MenuCategory::all();
        return view("shop.menu.add",compact("menucategorys"));
    }
    public  function  edit(Request $request,$id){
//        读取一条数据
        $menus=Menu::find($id);
//        判定提交方式
        if ($request->isMethod("post")){
//            储存数据
            $data=$request->post();
//            拿到数据执行修改方法
            if ($menus->update($data)){
//                跳转视图
                return redirect()->route("shop.menu.index")->with("success","修改成功");

            }
        }
//        显示自己的视图
        $menucategorys=MenuCategory::all();
        return view("shop.menu.edit",compact("menus","menucategorys"));
    }
    public  function  del($id){
//        读取一条数据
        $menu=Menu::find($id);
//        拿到数据执行删除方法
        if ($menu->delete()){
//            跳转到首页
            return redirect()->route("shop.menu.index")->with("success","删除成功");
        }
    }

}
