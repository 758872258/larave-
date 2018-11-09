<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nav;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class NavController extends BaseController
{
    //添加
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request,[
                'name' =>'required',
                'sort' => [
                    'required',
                    'regex:/^\d+$/'],
                'pid' => [
                    'required',
                    'regex:/^\d+$/']
            ]);
            $data=$request->all();
            if (Nav::create($data)) {
                return redirect()->route('admin.nav.add')->with('success','添加成功');
            }
        }
        //查询路由
        $routes = Route::getRoutes();
        //循环得到单个路由
        foreach ($routes as $route) {
            //判断命名空间是 后台的
            if (isset($route->action["namespace"]) && $route->action["namespace"]=="App\Http\Controllers\Admin"){
                //取别名存到$urls中
                if(isset($route->action['as'])){
                    $urls[]=$route->action['as'];
                }
            }
        }
        //查询数据库总已有路由
        $url2=Nav::pluck('url')->toArray();
        $urls=array_diff($urls,$url2);
        //查询父级id
        $parents=Nav::where('pid',0)->get();
        //视图
        return view('admin.nav.add',compact('parents','urls'));
    }
}
