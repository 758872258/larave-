<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //添加购物车
    public function add(Request $request)
    {
        $goods = $request->post('goodsList');
        $counts = $request->post('goodsCount');
        $uid=$request->post("user_id");
        //清空当前用户购物车
        Cart::where("user_id", $request->post('user_id'))->delete();
//        dd($uid);
        foreach ($goods as $k => $good) {
            $data = [
                'user_id' => $uid,
                'goods_id' => $good,
                'goods_count' => $counts[$k]
            ];
            Cart::create($data);
        }
        return [
            'status' => "true",
            'message' => "添加成功"
        ];
    }

    //显示订单
    public function index(Request $request)
    {
        //得到当前用户id
        $uid=$request->post("user_id");
        //获取当前用户的购物车
        $carts=Cart::where("user_id",$uid)->get();
        //声明一个空数组
        $goodsList=[];
        //声明一个总价
        $totalCost = 0;
        foreach ($carts as $k => $v)
        {
            $good = Menu::where('id', $v->goods_id)->first(['id as goods_id','goods_name','goods_img', 'goods_price']);
            //图片拼接
            $good->goods_img=env("ALIYUN_OSS_URL").$good->goods_img;
            $good->amount = $v->goods_count;
            //算总价
            $totalCost += $v->goods_count * $good->goods_price;
            $goodsList[] = $good;
        }
        return [
            'goods_list' => $goodsList,
            'totalCost' => $totalCost
        ];
    }
}

