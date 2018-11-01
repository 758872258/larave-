<?php
/**
 * Created by PhpStorm.
 * User: 75887
 * Date: 2018/10/29
 * Time: 11:36
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends  Controller
{
public  function index(){

$shops=Shop::where("status",1)->get();
foreach ($shops as $k=>$v){
    $shops[$k]['distance']=rand(1000,6000);
    $shops[$k]['estimate_time']=$shops[$k]['distance']/100;
return $shops;

}
}
    public function detail()
    {
        $id = request()->get('id');
        //$id = 1;
        $shop = Shop::find($id);
        $shop->shop_img=env("ALIYUN_OSS_URL").$shop->shop_img;
        $shop->service_code = 4.6;
        $shop->evaluate = [
            [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "不怎么好吃"],
            ["user_id" => 12344,
                "username" => "w******k",
                "user_img" => "http=>//www.homework.com/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 4.5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"]
        ];
        $cates=MenuCategory::where("shop_id",$id)->get();
        //当前分类有哪些商品
        foreach ($cates as $k=>$cate){
            $cates[$k]->goods_list=$cate->goods;
        }
        $shop->commodity=$cates;
        return $shop;
        // dd($shop->toArray());
    }
}