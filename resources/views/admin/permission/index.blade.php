@extends("layouts.main")

@section("title","管理员首页")

@section("content")



    <table class="table">

        <tr>
            <th>id</th>
            <th>管理员名称</th>
            <th>管理员描述</th>
            <th>操作</th>
        </tr>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->intro}}</td>
            </tr>
        @endforeach
    </table>
    {{--{{$admins->links()}}--}}

@endsection