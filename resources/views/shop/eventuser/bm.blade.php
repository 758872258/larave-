@extends("layouts.main")

@section("title","商品添加")

@section("content")



        <table class="table" >
        <tr>
            <th>id</th>
            <th>活动标题</th>
            <th>活动详情</th>
            <th>报名开始时间</th>
            <th>报名结束时间</th>
            <th>开奖时间</th>
            <th>报名人数限制</th>
            <th>是否已开奖</th>
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
            </tr>
        </table>
@endforeach
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <table class="table">

        <div class="form-group">
            <label class="col-sm-2 control-label">活动名称</label>
            <div class="col-sm-10">
               <select name="event_id" class="form-control" >
                   @foreach($events as $event)
                   <option value="{{$event->id}}">{{$event->title}}</option>
                       @endforeach
               </select>
            </div>
        </div>

        </table>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">报名</button>
            </div>
        </div>
    </form>


@endsection