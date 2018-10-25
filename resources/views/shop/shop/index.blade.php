@extends("layouts.main")

@section("title","商品列表")

@section("content")


    {{--<a href="{{route('shop')}}" class="btn btn-primary">注册</a>--}}
    <table class="table">

        <tr>
            <th>id</th>
            <th>店铺分类ID</th>
            <th>名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>是否是品牌</th>
            <th>是否准时送达</th>
            <th>是否蜂鸟配送</th>
            <th>是否保标记</th>
            <th>是否票标记</th>
            <th>是否准标记</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态:1正常,0待审核,-1禁用</th>
            <th>所属商家id</th>

            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->id}}</td>
                <td>{{$shop->shop_category_id}}</td>
                <td>{{$shop->shop_name}}</td>
                <td>{{$shop->shop_img}}</td>
                <td>{{$shop->shop_rating}}</td>
                <td>{{$shop->brand}}</td>
                <td>{{$shop->on_time}}</td>
                <td>{{$shop->fengniao}}</td>
                <td>{{$shop->bao}}</td>
                <td>{{$shop->piao}}</td>
                <td>{{$shop->zhun}}</td>
                <td>{{$shop->start_send}}</td>
                <td>{{$shop->send_cost}}</td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->discount}}</td>
                <td>{{$shop->status}}</td>
                <td>{{$shop->shop_id}}</td>


                <td>
                    {{--<a href="{{route('shops.detail',$shop->id)}}" class="btn btn-primary">查看</a>--}}
                    {{--<a href="{{route('shop.shop.edit',$shop->id)}}" class="btn btn-success">编辑</a>--}}
                    {{--<a href="{{route('shop.shop.del',$shop->id)}}" class="btn btn-danger">删除</a>--}}
                    {{--<a href="{{route('shop.register')}}" class="btn btn-primary">注册</a>--}}

                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$shops->links()}}--}}

@endsection