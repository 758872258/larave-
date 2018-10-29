<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShopCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ShopCategories;
use Illuminate\Support\Facades\Storage;

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
//        Storage::delete($shopcategorie->img);
//        $data['img']=$request->file("img")->store("images");
//        dd($data);

//        拿到数据执行方法
        if (ShopCategories::create($data)){
//            跳转视图
            return redirect()->route("admin.shopcategorie.index")->with("success","添加成功");
        }
    }
//返回自己的视图
    return view("admin.shopcategorie.add");
}



//修改一个商家分类的方法
    public  function edit(Request $request,$id){
//    读取一条数据
        $shopcategorie=ShopCategories::find($id);
//    判定提交方式
        if($request->isMethod("post")){
//        存储数据
            $data=$request->post();

//            $img=$request->file("img");
//            dd($img);
//            $data['img']=$request->file("img")->store("images");
            Storage::delete($shopcategorie->img);

//        拿到数据执行方法
            if ($shopcategorie->update($data)){
//            跳转视图
                return redirect()->route("admin.shopcategorie.index")->with("success","修改成功");
            }
        }
        return view("admin.shopcategorie.edit",compact("shopcategorie"));

}
public function del($id){
//    读取一条数据
    $shopcategorie=ShopCategories::find($id);
//    拿到数据执行方法
        Storage::delete($shopcategorie->img);
    if ($shopcategorie->delete()){

//        返回视图
        return redirect()->route("admin.shopcategorie.index")->with("success","删除成功");
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
