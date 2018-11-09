<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/shop', function (Request $request) {
    return $request->user();
});
Route::get("shop/index","Api\ShopController@index");
Route::get("shop/detail","Api\ShopController@detail");
//短信验证
Route::get("member/sms","Api\MemberController@sms");
//注册
Route::any("member/reg","Api\MemberController@reg");
//登陆
Route::any("member/login","Api\MemberController@login");
//修改密码
Route::any("member/change","Api\MemberController@change");
//忘记密码
Route::any("member/reset","Api\MemberController@reset");
//用户详情
Route::any("member/detail","Api\MemberController@detail");
//收货地址
Route::any("address/add","Api\AddressController@add");
//显示地址
Route::any("address/index","Api\AddressController@index");
//修改地址
Route::any("address/edit","Api\AddressController@edit");
//修改地址回显
Route::any("address/look","Api\AddressController@look");
//添加商品到购物车
Route::any("cart/add","Api\CartController@add");
//显示订单
Route::any("cart/index","Api\CartController@index");
//订单
Route::any("order/add","Api\OrderController@add");
Route::any("order/orderList","Api\OrderController@orderList");
Route::any("order/index","Api\OrderController@index");
Route::any("order/pay","Api\OrderController@pay");
Route::get("order/detail","Api\OrderController@detail");