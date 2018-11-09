@extends("layouts.main")

@section("title","商品列表")

@section("content")
    {{--<a href="{{route('shop.shop.add')}}" class="btn btn-primary">添加</a>--}}
    <table class="table">

        <tr>
            <th>id</th>
            {{--<th>用户</th>--}}
            {{--<th>商家</th>--}}
            <th>订单编号</th>
            {{--<th>省</th>--}}
            {{--<th>市</th>--}}
            {{--<th>县</th>--}}
            <th>详细地址</th>
            <th>收货人电话</th>
            <th>收货人姓名</th>
            <th>价格</th>
            <th>状态</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                {{--<td>{{$order->user_id}}</td>--}}
                {{--<td>{{$order->shop_id}}</td>--}}
                <td>{{$order->order_code}}</td>
                {{--<td>{{$order->province}}</td>--}}
                {{--<td>{{$order->city}}</td>--}}
                {{--<td>{{$order->area}}</td>--}}
                <td>{{$order->detail_address}}</td>
                <td>{{$order->tel}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->total}}</td>
                <td>
                    @if($order->status== -1)取消@endif
                    @if($order->status== 0)待支付@endif
                    @if($order->status== 1)待发货@endif
                    @if($order->status== 2)待确认@endif
                    @if($order->status== 3)完成@endif

                </td>
                <td>{{$order->created_at}}</td>
                <td>
                    {{--<a href="{{route('shop.order.look',$order->id)}}" class="btn btn-primary">查看</a>--}}
                    @if($order->status== 0)
                        <a href="{{route('shop.order.shipment',[$order->id,1])}}" class="btn btn-success">支付</a>
                    @endif
                    @if($order->status== 1)
                        <a href="{{route('shop.order.shipment',[$order->id,2])}}" class="btn btn-danger">发货</a>
                    @endif
                    @if($order->status== 2)
                        <a href="{{route('shop.order.shipment',[$order->id,3])}}" class="btn btn-success">确认</a>
                    @endif

                    {{--<a href="{{route('shop.shop.edit',$shop->id)}}" class="btn btn-success">编辑</a>--}}
                    {{--<a href="{{route('shop.shop.del',$shop->id)}}" class="btn btn-danger">删除</a>--}}
                    {{--<a href="{{route('shop.register')}}" class="btn btn-primary">注册</a>--}}
                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$shops->links()}}--}}

@endsection