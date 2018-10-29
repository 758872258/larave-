<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\ShopCategories;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public  function index(){
//        获取所有数据
        $shops=Shop::all();
//        显示视图
        return view("admin.shop.index",compact("shops"));
    }
//    编辑商铺
public  function edit(Request $request,$id){
//        读取一条数据
        $shops=Shop::find($id);
//        判定提交方式
        if ($request->isMethod("post")){
//            接收数据
            $data=$request->post();
//            Storage::delete($shops->shop_img);
//            $data['shop_img']=$request->file("shop_img")->store("images");
            Storage::delete($shops->shop_img);
//            拿到数据执行修改方法
            if ($shops->update($data)){

//                跳转视图
                return redirect()->route("admin.shop.index")->with("success","修改成功");
            }
        }
//        显示自己的视图
    $ShopCategories=ShopCategories::all();
    return view("admin.shop.edit",compact("shops","ShopCategories"));
}

//审核
    public function examine($id)
    {
//        dd($id);
        //先通过id找到这条数据
//        $shop=ShopCategory::find($id);
        DB::table("shops")->where("id","=","$id")->update(["status"=>1]);
//        跳转视图
        return redirect()->route("admin.shop.index");

    }


public  function del($id){
//        读取一条数据
    $shop=Shop::find($id);
//    显示视图
    Storage::delete($shop->shop_img);
    if ($shop->delete()){
//        显示视图
        return view("admin.shop.index");

    }
}
    public function upload(Request $request)
    {
        //处理上传
        $file=$request->file("file");


        if ($file){
            //上传

            $url=$file->store("menu_cate");

            /// var_dump($url);
            //得到真实地址  加 http的址
            $url=Storage::url($url);

            $data['url']=$url;

            return $data;
            ///var_dump($url);
        }

    }
}

