<?php

namespace App\Http\Controllers\Shop;

use App\Models\MenuCategory;
use App\Models\Shop;
use App\Models\ShopCategories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuCategoryController extends BaseController
{
    public  function  index(){
//        读取所有数据
        $menucategorys=MenuCategory::all();
//        显示视图
return view("shop.menucategory.index",compact("menucategorys"));


    }
//    声明一个添加菜品分类的方法
public  function  add(Request $request){
//        判定提交方式
        if ($request->isMethod("post")){
            $data=$request->post();
//            拿到数据执行添加方法
            if (MenuCategory::create($data)){
//                跳转视图
                return redirect()->route("shop.menucategory.index")->with("success","添加成功");
            }
        }
        $shopcategories=ShopCategories::all();
        return view("shop.menucategory.add",compact("shopcategories"));
}
public  function edit(Request $request,$id){
//        读取一条数据
    $menucategory=MenuCategory::find($id);
//判断提交方式
if ($request->isMethod("post")){
//    储存数据
    $data=$request->post();
    if ($menucategory->update($data)){
//        跳转视图
        return redirect()->route("shop.menucategory.index")->with("success","修改成功");
    }
}
//显示自己的视图
//    拿到商品分类的数据
    $shopcategories=ShopCategories::all();
    return view("shop.menucategory.edit",compact("menucategory","shopcategories"));
}
public  function del($id){
//        读取一条数据

        $menucategory=MenuCategory::find($id);
//    if ($menucategory->shop){
//
//        return redirect()->route("shop.menucategory.index")->with("success","当前菜品分类属于一个商家，不能删除");
//    }
//        dd($menucategory->shop);
        if ($menucategory->delete()){
//            跳转视图
            return redirect()->route("shop.menucategory.index")->with("success","删除成功");
        }
}



}
