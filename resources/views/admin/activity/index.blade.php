@extends("layouts.main")

@section("title","商品列表")

@section("content")

    <a href="{{route('admin.activity.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>活动开始时间</th>
            <th>活动结束时间</th>
            <th>操作</th>
        </tr>
        @foreach($activitys as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->title}}</td>
                <td>{{$activity->content}}</td>
                <td>{{$activity->start_time}}</td>
                <td>{{$activity->end_time}}</td>
                <td>
                    <a href="{{route('admin.activity.edit',$activity->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('admin.activity.del',$activity->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$$activitys->links()}}--}}

@endsection