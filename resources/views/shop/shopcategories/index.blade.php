@extends("layouts.main")

@section("title","商品列表")

@section("content")


    <a href="{{route('shop.shop_categories.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>分类名称</th>
            <th>分类图片</th>
            <th>状态：1显示，0隐藏</th>
            <th>操作</th>
        </tr>
        @foreach($shop_categories as $$shop_categorie)
            <tr>
                <td>{{$shop_categorie->id}}</td>
                <td>{{$shop_categorie->name}}</td>
                <td>{{$shop_categorie->img}}</td>
                <td>{{$shop_categorie->status}}</td>




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