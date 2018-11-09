@extends("layouts.main")

@section("title","管理员首页")

@section("content")



    <table class="table">

        <tr>
            <th>id</th>
            <th>权限名称</th>
            <th>操作</th>
        </tr>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>

            </tr>
        @endforeach
    </table>
    {{--{{$admins->links()}}--}}

@endsection