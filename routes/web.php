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
    return view('index');
});


//前面的是配置虚拟机的网址
Route::domain("shop.ele.com")->namespace("Shop")->group(function (){

    //商家登陆注册
    Route::get("user/index","UserController@index")->name("shop.user.index");
    Route::any("user/register","UserController@register")->name("shop.user.register");
    Route::any("user/login","UserController@login")->name("shop.user.login");
    Route::any("user/home","UserController@home")->name("shop.user.home");
    Route::any("user/cat","UserController@cat")->name("shop.user.cat");

//商家信息表
    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
    Route::any("shop/add","ShopController@add")->name("shop.shop.add");

    Route::any("shop/edit","ShopController@edit")->name("shop.shop.edit");
    Route::get("shop/del","ShopController@del")->name("shop.shop.del");
//    菜品分类
    Route::get("menucategory/index","MenuCategoryController@index")->name("shop.menucategory.index");
    Route::any("menucategory/add","MenuCategoryController@add")->name("shop.menucategory.add");
    Route::any("menucategory/edit{id}","MenuCategoryController@edit")->name("shop.menucategory.edit");
    Route::get("menucategory/del{id}","MenuCategoryController@del")->name("shop.menucategory.del");
    // 菜品
    Route::get("menu/index","MenuController@index")->name("shop.menu.index");
    Route::any("menu/add","MenuController@add")->name("shop.menu.add");
    Route::any("menu/upload","MenuController@upload")->name("shop.menu.upload");
    Route::any("menu/edit{id}","MenuController@edit")->name("shop.menu.edit");
    Route::get("menu/del{id}","MenuController@del")->name("shop.menu.del");

});

//平台路由
Route::domain("admin.ele.com")->namespace("Admin")->group(function (){
//管理员路由
    Route::get("admin/index","AdminController@index")->name("admin.admin.index");
    Route::any("admin/add","AdminController@add")->name("admin.admin.add");
    Route::any("admin/login","AdminController@login")->name("admin.admin.login");
    Route::any("admin/register","AdminController@register")->name("admin.admin.register");
    Route::any("admin/edit{id}","AdminController@edit")->name("admin.admin.edit");
    Route::get("admin/del{id}","AdminController@del")->name("admin.admin.del");
    //商家分类
    Route::get("shopcategorie/index","ShopCategorieController@index")->name("admin.shopcategorie.index");
    Route::any("shopcategorie/add","ShopCategorieController@add")->name("admin.shopcategorie.add");
    Route::any("shopcategorie/upload","ShopCategorieController@upload")->name("admin.shopcategorie.upload");
    Route::any("shopcategorie/edit{id}","ShopCategorieController@edit")->name("admin.shopcategorie.edit");
    Route::any("shopcategorie/del{id}","ShopCategorieController@del")->name("admin.shopcategorie.del");

//管理员管理商家账号路由
    Route::get("user/index","UserController@index")->name("admin.user.index");
    Route::any("user/edit{id}","UserController@edit")->name("admin.user.edit");
    Route::get("user/del{id}","UserController@del")->name("admin.user.del");
//管理商家商铺
    Route::get("shop/index","ShopController@index")->name("admin.shop.index");
    Route::any("shop/edit{id}","ShopController@edit")->name("admin.shop.edit");
    Route::any("shop/upload","ShopController@upload")->name("admin.shop.upload");
    Route::get("shop/del{id}","ShopController@del")->name("admin.shop.del");
    Route::get("shop/examine{id}","ShopController@examine")->name("admin.shop.examine");

    //管理员管理商家账号路由
    Route::get("activity/index","ActivityController@index")->name("admin.activity.index");
    Route::any("activity/add","ActivityController@add")->name("admin.activity.add");
    Route::any("activity/edit{id}","ActivityController@edit")->name("admin.activity.edit");
    Route::get("activity/del{id}","ActivityController@del")->name("admin.activity.del");


});