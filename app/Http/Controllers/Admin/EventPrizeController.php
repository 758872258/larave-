<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventPrizeController extends Controller
{
//    奖品列表
    public  function index(){
//        读取所有数据
        $eventprizes=EventPrize::all();
//        显示视图
        return view("admin.eventprize.index",compact("eventprizes"));
    }
//    声明一个添加奖品的方法
    public function add(Request $request)
    {
//        判定提交方式
        if ($request->isMethod("post")){
//            储存数据
            $data=$request->post();
//            拿到数据执行添加方法
            if (EventPrize::create($data)){
//                跳转视图
                return redirect()->route("admin.eventprize.index")->with("success","添加奖品成功");

            }
        }
//        显示视图 分配数据
        $events=Event::all();
        return view("admin.eventprize.add",compact("events"));
    }
    public  function edit(Request $request,$id){
//        读取一条数据
        $eventprizes=EventPrize::find($id);
//        判定提交方式
        if ($request->isMethod("post")){
//            存储数据
            $data=$request->post();
            if ($eventprizes->update($data)){
//                跳转视图
                return redirect()->route("admin.eventprize.index")->with("success","修改奖品成功");
            }
        }
        //        显示视图 分配数据
        $events=Event::all();
        return view("admin.eventprize.edit",compact("eventprizes","events"));
    }

//声明一个删除活动的方法
    public function del($id)
    {
//        拿到一条数据
        $eventprize=EventPrize::find($id);
        if ($eventprize->delete()){

//            跳转视图
            return redirect()->route("admin.eventprize.index")->with("success","删除奖品成功");
        }
}
}
