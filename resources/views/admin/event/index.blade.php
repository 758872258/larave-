@extends("layouts.main")

@section("title","商品列表")

@section("content")

    <a href="{{route('admin.event.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>活动详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖时间</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
            <th>操作</th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->content}}</td>
                <td>{{date("Y-m-d",$event->start_time)}}</td>
                <td>{{date("Y-m-d",$event->end_time)}}</td>
                <td>{{date("Y-m-d",$event->prize_time)}}</td>
                <td>{{$event->num}}</td>
                <td>{{$event->is_prize}}</td>
                <td>
                    <a href="{{route('admin.event.edit',$event->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('admin.event.del',$event->id)}}" class="btn btn-danger">删除</a>
                    <a href="{{route('admin.event.open',$event->id)}}" class="btn btn-danger">开奖</a>
                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$$events->links()}}--}}

@endsection