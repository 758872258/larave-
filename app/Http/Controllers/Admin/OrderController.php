<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    //总    一家商家的所有订单
    public function user()
    {
        //得到所有店铺
        $shop_id=Shop::all();

        $orders =Order::whereIn("shop_id",$shop_id)

            ->select(DB::raw("shop_id as sid,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('sid')
            ->get();

        return view("admin.order.user",compact('orders'));
    }

    //日
    public function day(Request $request)
    {
        $orders=Order::select(DB::raw("shop_id,DATE_FORMAT(created_at,'%Y-%m-%d') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('shop_id')
            ->groupBy('date')
            ->get();
//        dd($orders);
        return view("admin.order.day",compact("orders"));
    }
    //月
    public function month()
    {
        $orders=Order::select(DB::raw("shop_id,DATE_FORMAT(created_at,'%Y-%m') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('shop_id')
            ->groupBy('date')
            ->get();
//        dd($orders);
        return view("admin/order/month",compact("orders"));
    }


    //总        所有商家的所有订单
    public function all()
    {
        $orders = Order::select(DB::raw("COUNT(*) as nums,SUM(total) as money"))->get();
        return view("admin/order/all",compact('orders'));
    }

    //日
    public function days()
    {
        $orders = Order::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();
        return view("admin/order/days",compact('orders'));
    }
    //月
    public function months()
    {
        $orders = Order::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();
        return view("admin/order/months",compact('orders'));
    }




    //总   一家商家的菜品订单
    public function userm()
    {
        $orders=OrderDetail::select(DB::raw("sum(amount) as nums,sum(amount*goods_price) as money"))->get();
//        dd($orders);
        return view("admin/order/userm",compact("orders"));
    }





//    没有搞出来  没有搞出来  没有搞出来没有搞出来没有搞出来没有搞出来没有搞出来没有搞出来没有搞出来没有搞出来没有搞出来

    //日
    public function daym()
    {
        //得到所有店铺
        $shop_id=Shop::pluck("id");
//        dd($shop_id);
        $order=Order::whereIn("shop_id",$shop_id)->get();
        $order=Order::select(DB::raw("shop_id"))->groupBy('shop_id')->get();
//        dd($re);
        foreach ($order as $k=>$v)
        {
            $arr[$k]=$v->shop_id;
        }
        //dd($arr);
        foreach (Shop::whereIn('id',$arr)->get() as $m=>$n)
        {
            $arr2[$m]=$n->shop_name;
        }
//        dd($arr2);
        $orders=OrderDetail::whereIn("order_id",$arr2)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,sum(amount) as nums,sum(amount*goods_price) as money"))
            ->groupBy('date')
            ->get();
        dd($orders);
        return view("admin/order/daym",compact("orders"));
    }
    //月
    public function monthsm()
    {
        //得到所有店铺
        $shop_id=Shops::all();
        $order_id=Order::whereIn("shop_id",$shop_id)->pluck("id");
//        dd($order_id);
        $orders=Ordergoods::whereIn("order_id",$order_id)->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,sum(amount) as nums,sum(amount*goods_price) as money"))
            ->groupBy('date')
            ->get();
//        dd($orders);
        return view("admin/order/monthsm",compact("orders"));
    }
}
