<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use App\Models\ShopCategories;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends BaseController
{
public  function  index()
{
// 读取所有数据
    $shops=Shop::all();
//    显示视图

    return view("shop.shop.index",compact("shops"));
}
//声明一个添加商家分类的方法
public  function add(Request $request){
//判定提交方式

    if ($request->isMethod("post")){
//        接收数据
        $data=$request->post();
        $data['shop_img']=$request->file("shop_img")->store("images");
//        dd($data['shop_img']);
//        $data['user_id']=Auth::user()->id;

//      dd($data['user_id']);
//        拿到数据执行方法
        if (Shop::create($data)){
//            跳转到首页
return redirect()->route("shop.user.login")->with("success","申请成功，等待管理员审核");
        }


    }
//    分配数据在添加时拿到商家分类的id
    $ShopCategories=ShopCategories::all();

//    显示自己的视图
    return view("shop.shop.add",compact("ShopCategories","shops"));

}


}
