@extends("layouts.main")

@section("title","管理员首页")

@section("content")


    <a href="{{route('admin.admin.add')}}" class="btn btn-primary">添加</a>
    <a href="{{route('admin.user.index')}}" class="btn btn-primary">商家管理</a>
    <a href="{{route('admin.shop.index')}}" class="btn btn-primary">商铺管理</a>
    <a href="{{route('admin.shopcategorie.index')}}" class="btn btn-primary">商铺分类管理</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>管理员名称</th>
            <th>管理员邮箱</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
        @foreach($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->password}}</td>
                <td>
                    <a href="{{route('admin.admin.edit',$admin->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('admin.admin.del',$admin->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{$admins->links()}}--}}

@endsection