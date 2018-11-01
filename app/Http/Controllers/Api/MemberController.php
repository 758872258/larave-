<?php

namespace App\Http\Controllers\Api;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Mrgoon\AliSms\AliSms;

class MemberController extends Controller
{

//    注册
    public function reg(Request $request)
    {

//        接收数据
        $data = $this -> validate($request,[
            'username' => "required",
            'password' => "required",
            'sms'=>"required",
            'tel'=>"required",
        ]);
        if ($data['sms']==Redis::get("tel_".$data['tel'])){
//接收数据
            $data['name']=$data['username'];

            $data['password']=bcrypt($data['password']);

            if (Member::create($data)){
                $data2=[
                    "status"=>'true',
                    "message"=>"注册成功"
                ];
            }else{
                $data2=[
                    "status"=>'false',
                    "message"=>"注册失败"
                    ];
            }
        }else{
            $data2=[
                "status"=>'false',
                "message"=>"验证码错误"
            ];
        }
        return $data2;

    }
//短信
    public function sms(Request $request)
    {
//       接收参数
        $tel=$request->get('tel');
//        随机生成验证码
        $code=rand(1000,9999);
//        用redis储存验证码 可以用文件缓存存验证码 5是测试，正规是300秒
Redis::setex("tel_".$tel,5*60,$code);

//        把验证码发送给手机
        //TODO
        $config = [
//            账号
            'access_key' => 'LTAIfNUbDdlhsNv9',
//            密码
            'access_secret' => 'NCsfvavDFh3sKsYL1s08EjguxrEPJz',
//            签名
            'sign_name' => '个人分享',
        ];


        $sms=new AliSms();
        $response = $sms->sendSms($tel, 'SMS_149422553', ['code'=> $code], $config);
//        dd($response);
        if ($response->Code=="OK"){
            $data = [
                "status" => true,
                "message" => "获取短信验证码成功"
            ];
        }else{
            $data = [
                "status" => false,
                "message" => "获取短信验证码失败" . $code
            ];
        }
        //返回

        return $data;

    }


    //登录
    public function login(Request $request)
    {
        $data=$request->post();
        $name=$data["name"];
        $password=$data["password"];
        $member=Member::where("name",$name)->first();
        if($member && Hash::check($password, $member->password))
        {
            $data2 = [
                "status" => 'true',
                "message" => "登录成功",
                "user_id"=>$member->id,
                "username"=>$name

            ];
        }
        else
        {
            $data2 = [
                "status" => "false",
                "message" => "用户名或密码错误"
            ];
        }
        return $data2;
    }
//忘记密码
    public function reset(Request $request)
    {
        //接收数据
        $data=$this->validate($request,[
            'password' => "required",
            'tel'=>"required",
            'sms'=>"required",
        ]);
        //对比验证码
        if($data['sms']==Redis::get('tel_'.$data['tel'])){
            //加密
            $data['password']=bcrypt($data['password']);
            //手机号码查找
            $member=Member::where('tel',$data['tel'])->first();
            //写到数据库
            if ($member) {
                $member->password=$data['password'];
                if($member->save()){
                    $data2=[
                        "status"=> "true",
                        "message"=> "密码修改成功"
                    ];
                }
            }else{
                $data2=[
                    "status"=> "false",
                    "message"=> "用户不存在"
                ];
            }
        }else{
            $data2=[
                "status"=> "false",
                "message"=> "验证码错误"
            ];
        }
        return $data2;
    }


    //密码修改
    public function change(Request $request)
    {
        //接收数据
        $data=$this->validate($request,[
            'oldPassword' => "required",
            'newPassword' => "required",
            'id'=>"required",
        ]);
        //验证旧密码
        $member=Member::find($data['id']);
        if(Hash::check($data['oldPassword'],$member->password)){
            //修改密码
            $member->password=bcrypt($data['newPassword']);
            if ($member->save()) {
                $data2=[
                    "status"=> "true",
                    "message"=> "密码修改成功"
                ];
            }
        }else{
            $data2=[
                "status"=> "false",
                "message"=> "两次输入不一致"
            ];
        }
        return $data2;
    }
//用户详情
    public function detail(Request $request)
    {
//返回
return Member::find($request->input('user_id'));
}
}
