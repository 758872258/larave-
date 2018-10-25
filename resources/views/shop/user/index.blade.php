@extends("layouts.main")

@section("title","商品列表")

@section("content")


    {{--<a href="{{route('user')}}" class="btn btn-primary">注册</a>--}}
    <table class="table">

        <tr>
            <th>id</th>
            <th>名字</th>
            <th>邮箱</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>




                <td>
                    {{--<a href="{{route('users.detail',$user->id)}}" class="btn btn-primary">查看</a>--}}
                    {{--<a href="{{route('user.user.edit',$user->id)}}" class="btn btn-success">编辑</a>--}}
                    {{--<a href="{{route('user.user.del',$user->id)}}" class="btn btn-danger">删除</a>--}}
                    {{--<a href="{{route('user.register')}}" class="btn btn-primary">注册</a>--}}

                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$users->links()}}--}}

@endsection