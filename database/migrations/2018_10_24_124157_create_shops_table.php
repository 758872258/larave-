<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("shop_category_id")->comment("店铺分类id");
            $table->string("shop_name")->comment("名称");
            $table->string("shop_img")->comment("店铺名称");
            $table->string("shop_rating")->comment("评分");
            $table->string("brand")->comment("是否是品牌");
            $table->string("on_time")->comment("是否准时达");
            $table->string("fengniao")->comment("是否蜂鸟配送");
            $table->string("bao")->comment("是否保标记");
            $table->string("piao")->comment("是否票标记");
            $table->string("zhun")->comment("是否准标记");
            $table->string("start_send")->comment("起送金额");
            $table->string("send_cost")->comment("配送费");
            $table->string("notice")->comment("店公告");
            $table->string("discount")->comment("优惠信息");
            $table->string("status")->comment("状态-1/1/0");
            $table->string("shop_id")->comment("所属商家");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
