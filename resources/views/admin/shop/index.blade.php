@extends("layouts.main")

@section("title","商品列表")

@section("content")


    {{--<a href="{{route('shop')}}" class="btn btn-primary">注册</a>--}}
    <table class="table">

        <tr>
            <th>id</th>
            <th>商铺名称</th>
            <th>商铺图片</th>
            <th>商铺公告</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($shops as $shop)
            <tr>
                <td>{{$shop->id}}</td>
                <td>{{$shop->shop_name}}</td>
                <td><img src="{{$shop->shop_img}}?x-oss-process=image/resize,m_fill,w_80,h_80"></td>
                <td>{{$shop->notice}}</td>
                <td>{{$shop->status}}</td>




                <td>
                    {{--<a href="{{route('shops.detail',$shop->id)}}" class="btn btn-primary">查看</a>--}}
                    <a href="{{route('admin.shop.edit',$shop->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('admin.shop.del',$shop->id)}}" class="btn btn-danger">删除</a>
                    @if($shop->status==0)
                        <a href="{{route('admin.shop.examine',$shop->id)}}" class="btn btn-success">审核</a>
                    @endif
                    {{--<a href="{{route('shop.register')}}" class="btn btn-primary">注册</a>--}}

                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$shops->links()}}--}}

@endsection