<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop_Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopCategoriesController extends Controller
{
public  function index(){
//    读取所有数据
    $shop_categories=Shop_Categories::all();
//跳转视图
    return view("shop.shopcategories.index",compact("shopcategories"));
}
//添加一个商家分类的方法
public  function add(Request $request){
//    判定提交方式
    if($request->isMethod("post")){
//        存储数据
        $data=$request->post();
//        dd($data);
//        拿到数据执行方法
        if (Shop_Categories::create($data)){
//            跳转视图
            return redirect()->route("shop.shopcategories.index");
        }
    }

    return view("shop.shopcategories.add");


}
}
