<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Member;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class OrderController extends Controller
{
    //添加订单
    public function add(Request $request)
    {
//    {dd($request->post('address_id'));
        //读取一条数据  判定地址
        $site = Address::find($request->post('address_id'));
        if ($site === null) {
            return [
                "status" => "false",
                "message" => "地址不正确"
            ];
        }

        //查出店铺id
        $cart = Cart::where("user_id", $request->post('user_id'))->get();
//        dd($cart);
        $menuid = Menu::find($cart[0]->user_id)->shop_id;
//        dd($menuid);
        //给字段赋值
        $data['user_id'] = $request->post('user_id');
        $data['shop_id'] = $menuid;
        $data['order_code'] = date("ymdHis") . rand(1000, 9999);
        $data['province'] = $site->provence;
        $data['city'] = $site->city;
        $data['area'] = $site->area;
        $data['detail_address'] = $site->detail_address;
        $data['tel'] = $site->tel;
        $data['name'] = $site->name;

//        dd($data);
        //总价
        $totalCost = 0;
        foreach ($cart as $a => $b) {
            $good = Menu::where('id', $b->goods_id)->first();
            //总价
            $totalCost += $b->goods_count * $good->goods_price;
        }
        $data['total'] = $totalCost;
//        dd($data);
        $data['status'] = 0;
//        dd(11);
        //启动事务
        DB::beginTransaction();
        try {
            //添加订单
            $order = Order::create($data);
//            dd($order);
            //订单商品
//            dd($cart->toArray());
            foreach ($cart as $a=>$carts){
                $menu = Menu::find($carts->goods_id);

                $da['order_id']= $order->id;
                $da['goods_id'] = $carts->user_id;
                $da['amount'] = $carts->goods_count;
                $da['goods_name']  = $menu->goods_name;
                $da['goods_img'] = $menu->goods_img;
                $da['goods_price'] = $menu->goods_price;
//                dd($da);
                OrderDetail::create($da);
            }
//            dd($da);

            //清空购物车
            Cart::where("user_id", $request->post('user_id'))->delete();
            //提交事务
            DB::commit();
        } catch (\Exception $exception) {
            //回滚
            DB::rollBack();
            return [
                "status" => "false",
                "message" => $exception->getMessage(),
            ];
        }
        return [
            "status" => "true",
            "message" => "添加成功",
            "order_id" => $order->id
        ];

    }

//指定订单详情

    public function detail(Request $request)
    {
        $order=Order::find($request->input('id'));
//        dd($order);
        $arr = [-1 => "已取消", 0 => "代付款", 1 => "待发货", 2 => "待确认", 3 => "完成"];
        $data['id'] = $order->id;
        $data['order_code'] = $order->order_code;
        $data['order_birth_time'] = (string)$order->created_at;
        $data['order_status'] = $arr["$order->status"];
        $data['shop_id'] = $order->shop_id;
        $data['shop_name'] = $order->shop->shop_name;
        $data['shop_img'] = $order->shop->shop_img;
        $data['order_price'] = $order->total;
        $data['order_address'] = $order->provence . $order->city . $order->area . $order->detail_address;
        $data['goods_list'] = $order->goods;
//        dd($data);
        return $data;

    }


//订单显示
    public function index(Request $request)
    {
        $orders = Order::where("user_id", $request->input('user_id'))->get();
        $datas=[];
        foreach ($orders as $order) {
            $data['id'] = $order->id;
            $data['order_code'] = $order->order_code;
            $data['order_birth_time'] = (string)$order->created_at;
            $data['order_status'] =$order->status;
            $data['shop_id'] = (string)$order->shop_id;
            $data['shop_name'] = $order->shop->shop_name;
            $data['shop_img'] = $order->shop->shop_img;
            $data['order_price'] = $order->total;
            $data['order_address'] = $order->provence . $order->city . $order->area . $order->detail_address;
            $data['goods_list'] = $order->goods;
            $datas[] = $data;
        }
        return $datas;


    }

//     订单支付
    public function pay(Request $request)
    {
        // 得到订单
        $order = Order::find($request->post('id'));
//        dd($order);
        //得到用户
        $member = Member::find($order->user_id);
        //判断钱够不够
        if ($order->total > $member->money) {
            return [
                'status' => 'false',
                "message" => "用户余额不够，请充值"
            ];
        }
        //否则扣钱
        $member->money = $member->money - $order->total;
        $member->save();
        //更改订单状态
        $order->status = 1;
        $order->save();
        return [
            'status' => 'true',
            "message" => "支付成功"
        ];
    }


    //订单列表
    public function orderList()
    {
        //dd(123);
        $user_id = \request()->get('user_id');
        $orders = Order::where('user_id', $user_id)->get();
        //dd($orders->isEmpty());
        /* if($orders->isEmpty()){
             return [
                 'status'=>'false',
                 'message'=>'无订单，请刷新'
             ];
         }*/
        //dd($orders->first()->id);
        foreach ($orders as $m => $order) {
            //查询
            $order = Order::find($order->id);
            $data['id'] = $order->id;
            $data['order_code'] = $order->order_code;
            $data['order_birth_time'] = $order->created_at->toDateString();
            //dd($data['order_birth_time']);
            $data['order_status'] = $order->status;//调用model中获取器
            $data['shop_id'] = $order->shop_id;
            //查询店铺信息
            $shop = Shop::findOrFail($order->shop_id);
            $data['shop_name'] = $shop->shop_name;
            $data['shop_img'] = $shop->shop_img;
            $data['order_price'] = $order->order_price;
            //$address=Address::find($order->order_address);
            $data['order_address'] = $order->name . ' ' . $order->tel . ' ' . $order->provence . $order->city . $order->area . $order->detail_address;
            //查询商品
            $goods = OrderDetail::where("order_id", $order->id)->get();
            //dd($goods);
            foreach ($goods as $k => $good) {
                $data2['goods_id'] = $good->goods_id;
                //查询商品信息
                //$menu=Menu::findOrFail($good->goods_id);
                $data2['goods_name'] = $good->goods_name;
                $data2['goods_img'] = $good->goods_img;
                $data2['amount'] = $good->amount;
                $data2['goods_price'] = $good->goods_price;
                $data3[$k] = $data2;
            }
            $data['goods_list'] = $data3;
            $data4[$m] = $data;
        }



        return $data4;

    }

    }

