<?php

namespace App\Http\Controllers\Shop;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
{
    public  function index()
    {
//        获取用户id
        $shop_id= Auth::id();
//        dd($shop_id);
        $orders = Order::where('shop_id', $shop_id)->get();
//显示视图
return view("shop.order.index",compact("orders"));
    }
//    商品状态
    public function shipment($id, $status)
    {
        $result= Order::where("id",$id)->where("shop_id",Auth::id())->update(['status'=>$status]);
        if ($result){
            return redirect()->route('shop.order.index')->with("success","更改状态成功");
        }
    }
//    按日统计
    public function day()
    {


//        拿到用户id
        $shopId=Auth::user()->shop->id;
//        dd($shopId);
//储存
        $data=  Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();


        //dd($data->toArray());
//        $orders=Order::all();
        return view('shop.order.day', compact('orders','data'));
    }

//  按月统计
    public function yue()
    {
//        拿到用户id
        $shopId=Auth::user()->shop->id;
//储存
        $data=  Order::where("shop_id",$shopId)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date,COUNT(*) as nums,SUM(total) as money"))
            ->groupBy('date')
            ->get();
        //dd($data->toArray());
//        dd($data);

//        $orders=Order::all();
        return view('shop.order.day', compact('orders','data'));
    }
//  总计
    public function zong()
    {
//        拿到用户id
        $shopId=Auth::user()->shop->id;
//储存
        $data=  Order::where("shop_id",$shopId)
            ->select(DB::raw("COUNT(*) as nums,SUM(total) as money"))
            ->get();
//        dd($data->toArray());
//        $orders=Order::all();
        return view('shop.order.zong', compact('orders','data'));
    }
    // 菜单统计 按天统计
    public function day1()
    {
        $shop=Auth::user()->id;
        $shopId=Shop::where("user_id",$shop)->first();
 // dd($shopId->id);

        $order_id= Order::where("shop_id",$shopId->id)->pluck("id");
//        dd($order_id);
        $data= OrderDetail::whereIn("order_id",$order_id)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,SUM(amount) as nums,sum(amount*goods_price) as money"))
            ->groupBy('date')
            ->get();
        return view('shop.order.day1', compact('data',compact("$shopId")));
    }

    // 菜单统计 按月计
    public function yue1()
    {
        $shop=Auth::user()->id;
        $shopId=Shop::where("user_id",$shop)->first();
        // dd($shopId->id);

        $order_id= Order::where("shop_id",$shopId->id)->pluck("id");
//        dd($order_id);
        $data= OrderDetail::whereIn("order_id",$order_id)
            ->select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date,SUM(amount) as nums,sum(amount*goods_price) as money"))
            ->groupBy('date')
            ->get();
        return view('shop.order.yue1', compact('data',compact("$shopId")));
    }


}
