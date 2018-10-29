@extends("layouts.main")

@section("title","商品列表")

@section("content")


    <a href="{{route('shop.menu.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>菜品名称</th>
            <th>所属分类</th>
            <th>价格</th>
            <th>描述</th>
            <th>提示信息</th>
            <th>商品图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->menucategory->name}}</td>
                <td>{{$menu->goods_price}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->tips}}</td>
                <td><img src="{{$menu->goods_img}}?x-oss-process=image/resize,m_fill,w_80,h_80">
                </td>
                <td>{{$menu->status}}</td>
                <td>
                    {{--<a href="{{route('$menus.detail',$$menu->id)}}" class="btn btn-primary">查看</a>--}}
                    <a href="{{route('shop.menu.edit',$menu->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('shop.menu.del',$menu->id)}}" class="btn btn-danger">删除</a>
                    {{--<a href="{{route('$menu.register')}}" class="btn btn-primary">注册</a>--}}

                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$$menus->links()}}--}}

@endsection