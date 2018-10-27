@extends("layouts.main")

@section("title","商品列表")

@section("content")


    <a href="{{route('shop.menucategory.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>菜品分类名称</th>
            <th>菜品编号</th>
            <th>所属商家</th>
            <th>描述</th>
            <th>是否是默认分类</th>
            <th>操作</th>
        </tr>
        @foreach($menucategorys as $menucategory)
            <tr>
                <td>{{$menucategory->id}}</td>
                <td>{{$menucategory->name}}</td>
                <td>{{$menucategory->type_accumulation}}</td>
                <td>{{$menucategory->shop->shop_name}}</td>
                <td>{{$menucategory->description}}</td>
                <td>{{$menucategory->is_selected}}</td>



                <td>
                    {{--<a href="{{route('$menucategorys.detail',$$menucategory->id)}}" class="btn btn-primary">查看</a>--}}
                    <a href="{{route('shop.menucategory.edit',$menucategory->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('shop.menucategory.del',$menucategory->id)}}" class="btn btn-danger">删除</a>
                    {{--<a href="{{route('$menucategory.register')}}" class="btn btn-primary">注册</a>--}}

                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$$menucategorys->links()}}--}}

@endsection