<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function add(Request $request)
    {
        //接收数据
        $data = $this->validate($request, [
            'user_id' => "required",
            'name' => "required",
            'tel' => "required",
            'provence' => "required",
            'city' => "required",
            'area' => "required",
            'detail_address' => "required"
        ]);
//        $data['user_id']=$data['id'];
        if (Address::create($data)) {
//            dd($data);
            $data2 = [
                "status" => "true",
                "message" => "保存成功"
            ];

        } else {
            $data2 = [
                "status" => "false",
                "message" => "保存失败"
            ];
        }
        return $data2;
    }

//显示收货地址
    public function index()
    {
        //接收id
        $id= request()->post("user_id");
//        dd($id);
//        查询属于user_id的地址
        $address = Address::where("user_id", $id)->get();
//        dd($site);
        return $address;
    }
//修改地址
    public function edit(Request $request)
    {
        if ($_POST) {
            //接收数据
            $data = $request->post();
//       dd($data);
            //读取一条
            $address = Address::find($data['id']);
            //修改一条
            $address->update($data);
            $data = [
                "status" =>"true",
                "message" => "修改成功"
            ];
            return $data;

        } else {
            $id = $request->post("id");
//          dd($id);
            $address = Address::find($id);
        }
        return $address;
    }
//修改地址回显
    public function look(Request $request)
    {
        $id=Address::find($request->post("id"));
        return $id;
    }

}
