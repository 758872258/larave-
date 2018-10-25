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
    Route::get("shopcategories/index","ShopCategoriesController@index")->name("shop.shopcategories.index");
    Route::any("shopcategories/add","ShopCategoriesController@add")->name("shop.shopcategories.add");
    Route::any("shopcategories/edit{id}","ShopCategoriesController@edit")->name("shop.shopcategories.edit");
    Route::any("shopcategories/del{id}","ShopCategoriesController@del")->name("shop.shopcategories.del");






    Route::get("shop/index","ShopController@index")->name("shop.shop.index");
    Route::any("shop/edit{id}","ShopController@edit")->name("shop.shop.edit");
    Route::any("shop/del{id}","ShopController@del")->name("shop.shop.del");




});