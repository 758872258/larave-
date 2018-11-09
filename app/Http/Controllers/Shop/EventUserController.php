<?php

namespace App\Http\Controllers\Shop;

use App\Models\Event;
use App\Models\EventUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventUserController extends BaseController
{
//    读取所有数据
    public function bm(Request $request){
//        读取活动表
        if ($request->isMethod("post")){
//            dd(1);
//            接收数据
            $data=$request->post();
            $data["user_id"]=Auth::user()->id;
//            dd($data);
            if (EventUser::create($data)) {
//                跳转视图
                return redirect()->route("shop.eventuser.bm")->with("success","报名成功");
            }
        }
        $events=Event::all();
//        显示视图
        return view("shop.eventuser.bm",compact("events"));
    }
}
