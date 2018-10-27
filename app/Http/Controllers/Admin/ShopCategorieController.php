<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopCategories;
class ShopCategorieController extends BaseController
{
public  function index(){
//    读取所有数据
    $shopcategories=ShopCategories::all();
//跳转视图
    return view("admin.shopcategorie.index",compact("shopcategories"));
}
//添加一个商家分类的方法
public  function add(Request $request){
//    判定提交方式
    if($request->isMethod("post")){
//        存储数据
        $data=$request->post();

        $data['img']=$request->file("img")->store("images");
//        dd($data);

//        拿到数据执行方法
        if (ShopCategories::create($data)){
//            跳转视图
            return redirect()->route("admin.shopcategorie.index");
        }
    }
//返回自己的视图
    return view("shop.shopcategorie.add");
}
//修改一个商家分类的方法
    public  function edit(Request $request,$id){
//    读取一条数据
        $shopcategorie=ShopCategories::find($id);
//    判定提交方式
        if($request->isMethod("post")){
//        存储数据
            $data=$request->post();

            $data['img']=$request->file("img")->store("images");


//        拿到数据执行方法
            if ($shopcategorie->update($data)){
//            跳转视图
                return redirect()->route("admin.shopcategorie.index");
            }
        }
        return view("admin.shopcategorie.edit",compact("shopcategorie"));

}
public function del($id){
//    读取一条数据
    $shopcategorie=ShopCategories::find($id);
//    拿到数据执行方法

    if ($shopcategorie->delete()){

//        返回视图
        return redirect()->route("admin.shopcategorie.index");
    }


}

}
