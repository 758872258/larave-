<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//前面的是配置虚拟机的网址
Route::domain("shop.ele.com")->namespace("Shop")->group(function (){

    //商家登陆注册
    Route::get("user/index","UserController@index")->name("shop.user.index");
    Route::any("user/register","UserController@register")->name("shop.user.register");
    Route::any("user/login","UserController@login")->name("shop.user.login");

    Route::any("user/cat","UserController@cat")->name("shop.user.cat");
    //商家分类
    Route::get("shopcategorie/index","ShopCategorieController@index")->name("shop.shopcategorie.index");
    Route::any("shopcategorie/add","ShopCategorieController@add")->name("shop.shopcategorie.add");
    Route::any("shopcategorie/edit{id}","ShopCategorieController@edit")->name("shop.shopcategorie.edit");
    Route::any("shopcategorie/del{id}","ShopCategorieController@del")->name("shop.shopcategorie.del");
//商家信息表
    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
    Route::any("shop/add","ShopController@add")->name("shop.shop.add");
    Route::any("shop/edit","ShopController@edit")->name("shop.shop.edit");
    Route::get("shop/del","ShopController@del")->name("shop.shop.del");

//    商家信息表
//    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
//    Route::any("shop/edit{id}","ShopController@edit")->name("shop.shop.edit");
//    Route::any("shop/del{id}","ShopController@del")->name("shop.shop.del");
});

//平台路由
Route::domain("admin.ele.com")->namespace("Admin")->group(function (){

    Route::get("admin/index","AdminController@index")->name("admin.admin.index");
    Route::any("admin/add","AdminController@add")->name("admin.admin.add");
    Route::any("admin/login","AdminController@login")->name("admin.admin.login");
    Route::any("admin/register","AdminController@register")->name("admin.admin.register");
    Route::any("admin/edit{id}","AdminController@edit")->name("admin.admin.edit");
    Route::get("admin/del{id}","AdminController@del")->name("admin.admin.del");


});