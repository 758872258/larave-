<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends BaseController
{
    public  function index(){
//        读取所有数据
        $activitys=Activity::all();
//        显示视图
        return view("admin.activity.index",compact("activitys"));
    }


    public  function add(Request $request){
//        判定提交方式
        if ($request->isMethod("post")){

//            储存数据
            $data=$request->post();
//            dd($data);
//            拿到数据执行添加方法
            if (Activity::create($data)){
//                跳转视图
                return redirect()->route("admin.activity.index")->with("success","添加成功");

            }
        }
//        显示自己的视图
        return view("admin.activity.add");
    }
    public  function edit(Request $request,$id){
//        读取一条数据
        $Activity=Activity::find($id);
        $Activity->start_time=str_replace(" ","T",$Activity->start_time);
        $Activity->end_time=str_replace(" ","T",$Activity->end_time);

//        判断提交方式
        if ($request->isMethod("post")){
            //            储存数据
            $data= $this->validate($request,[
                "title"=>"required",
                "start_time"=>"required",
                "end_time"=>"required",
                "content"=>"required"
            ]);
            $data['start_time']=str_replace("T"," ",$data['start_time']);
            $data['end_time']=str_replace("T"," ",$data['end_time']);


//            $data=$request->post();
//            拿到数据，执行修改方法
            if ($Activity->update($data)){
//                跳转视图
                return redirect()->route("admin.activity.index")->with("success","修改成功");
            }
        }
        return view("admin.Activity.edit",compact("Activity"));
    }
    public  function del($id){
//        读取一条数据
$Activity=Activity::find($id);
//执行删除方法
        if ($Activity->delete()){
//            跳转到首页
            return redirect()->route("admin.activity.index")->with("success","删除成功");

        }
    }

}
