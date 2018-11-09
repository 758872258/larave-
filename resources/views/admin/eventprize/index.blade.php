@extends("layouts.main")

@section("title","商品列表")

@section("content")

    <a href="{{route('admin.eventprize.add')}}" class="btn btn-primary">添加</a>
    <table class="table">

        <tr>
            <th>id</th>
            <th>活动名称</th>
            <th>奖品名称</th>
            <th>奖品详情</th>
            <th>中奖商家账号</th>
            <th>操作</th>
        </tr>
        @foreach($eventprizes as $eventprize)
            <tr>
                <td>{{$eventprize->id}}</td>
                <td>{{$eventprize->event->title}}</td>
                <td>{{$eventprize->name}}</td>
                <td>{{$eventprize->description}}</td>
                <td>{{$eventprize->user_id}}</td>
                <td>
                    <a href="{{route('admin.eventprize.edit',$eventprize->id)}}" class="btn btn-success">编辑</a>
                    <a href="{{route('admin.eventprize.del',$eventprize->id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
        @endforeach


    </table>
    {{--{{$$eventprizes->links()}}--}}

@endsection