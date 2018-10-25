@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺分类</label>
            <div class="col-sm-10">
                <select name="shop_category_id" >
@foreach($ShopCategories as $ShopCategorie)
                    <option value="{{$ShopCategorie->id}}"> {{$ShopCategorie->name}}</option>
    @endforeach
                </select>

            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_name" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="shop_img" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">评分</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_rating" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="start_send" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="send_cost" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">

                <textarea rows="5" class="form-control" name="notice"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control" name="discount">

                </textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态-1/1/0</label>
            <div class="col-sm-10">
                <input type="radio"   name="status"  checked value="1">通过
                <input type="radio"  name="status"  value="0">待审核
                <input type="radio"   name="status"  value="-1">禁用
            </div>
        </div>

        {{--<div class="form-group">--}}
            {{--<label class="col-sm-2 control-label">所属商家</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--<input type="text" class="form-control"  name="user_id" >--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                <input type="checkbox" name="brand" value="1">
                <label >品牌</label>
                <input type="checkbox" name="on_time" value="1">
                <label >准时送达</label>
                <input type="checkbox" name="fengniao" value="1">
                <label >蜂鸟配送</label>
                <input type="checkbox" name="bao" value="1">
                <label >保标记</label>
                <input type="checkbox" name="piao" value="1">
                <label >票标记</label>
                <input type="checkbox" name="zhun" value="1">
                <label >准标记</label>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>


@endsection