<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\EventPrize;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class EventController extends Controller
{
    public function index()
    {
//        活动列表
       $events=Event::all();
//       显示视图
        return view("admin.event.index",compact("events"));
    }
//声明一个添加活动的方法
    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required',
                'num' => 'required',
            ]);
            $data = $request->post();
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            $data['prize_time'] = strtotime($data['prize_time']);
            $data['is_prize'] = 0;
//            拿到数据执行添加方法
            if (Event::create($data)){
//                跳转视图
                return redirect()->route('admin.event.index')->with("success","添加活动成功");
            }


        }
        //显示视图
        return view("admin.event.add");
    }

public function edit(Request $request,$id)
{
//        拿到一条数据
    $events = Event::find($id);
//   判定提交方式
    if ($request->isMethod("post")){

//        接收数据
        $data=$request->post();
        $data['start_time'] = strtotime($data['start_time']);
        $data['end_time'] = strtotime($data['end_time']);
        $data['prize_time'] = strtotime($data['prize_time']);
        $data['is_prize'] = 0;
        if ($events->update($data)){
//            跳转视图
            return redirect()->route("admin.event.index")->with("success","修改活动成功");
        }
    }
//    显示视图
    return view("admin.event.edit",compact("events"));
}

    public function del($id)
    {
//        拿到一条数据
        $event=Event::find($id);
//        拿到数据执行删除方法
        if ($event->delete()){
//            跳转视图
            return redirect()->route("admin.event.index")->with("success","删除活动成功");
        }
   }
//声明一个平台抽奖报名的方法
   public  function all(){
//        读取所有数据
     $events=Event::all();
//     显示视图
return view("admin.event.all",compact("events"));
   }
//活动开奖
    public function open($id){
        //1.通过当前活动ID把已经报名的用户ID取出来
        $userIds=DB::table('event_users')->where('event_id',$id)->pluck('user_id')->toArray();
        //2.打乱$userIds
        shuffle($userIds);
        //3.找出当前活动的奖品 并随机打乱
        $prizes=EventPrize::where("event_id",$id)->get()->shuffle();
        //4.操作奖品表
        foreach ($prizes as $k=>$prize){
            //4.1 给奖品的user_id 赋值
            $prize->user_id=$userIds[$k];
            //4.2 保存修改状态
            $prize->save();
        }
        //5.修改当前活动状态
        $event=Event::find($id);
        $event->is_prize=1;

        $event->save();
        //6.返回
        return redirect()->route('admin.event.index')->with('success','开奖成功');
    }
}