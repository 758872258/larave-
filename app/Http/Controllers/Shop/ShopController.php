<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends BaseController
{
public  function  index()
{
// 读取所有数据
    $shops=Shop::all();
//    显示视图

    return view("shop.shop.index",compact("shops"));
}
public  function add(Request $request){

    if ($request->isMethod("post")){
        $data=$request->post();
        if (Shop::create($data)){



        }
        $shops=Shop::all();
        return view("shop.shop.add",compact("shops"));

    }


}

}
