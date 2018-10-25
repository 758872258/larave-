@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">店铺分类id</label>
            <div class="col-sm-10">
                <select>
@foreach($shops as $shop)
                    <option value="{{$shop->id}}"> {{}}</option>
    @endforeach
                </select>>
                <input type="text" class="form-control"  name="shop_category_id" value="{{old("shop_category_id")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_name" value="{{old("shop_name")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">图片</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_img" value="{{old("shop_img")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">评分</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_rating" value="{{old("shop_rating")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否品牌是</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="brand" value="{{old("brand")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">是否准时送达</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="on_time" value="{{old("on_time")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否蜂鸟配送</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="fengniao" value="{{old("fengniao")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">是否表标记</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="bao" value="{{old("bao")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否票标记</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="piao" value="{{old("piao")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">是否准标记</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="zhun" value="{{old("zhun")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="start_send" value="{{old("start_send")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="send_cost" value="{{old("send_cost")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="notice" value="{{old("notice")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="discount" value="{{old("discount")}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态-1/1/0</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="status" value="{{old("status")}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">所属商家</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="shop_id" value="{{old("shop_id")}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>


@endsection