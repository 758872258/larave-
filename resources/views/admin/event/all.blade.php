@extends("layouts.main")

@section("title","抽奖报名管理")

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
            <th>商家</th>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->content}}</td>
                <td>{{date("Y-m-d",$event->start_time)}}</td>
                <td>{{date("Y-m-d",$event->end_time)}}</td>
                <td>{{date("Y-m-d",$event->prize_time)}}</td>
            </tr>
        @endforeach


    </table>
    {{--{{$$events->links()}}--}}

@endsection