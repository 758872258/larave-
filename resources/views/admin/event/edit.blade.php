@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="title"  value="{{$events->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control" value="{{$events->content}}" name="content">
{{$events->content}}
                </textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名开始时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{date("Y-m-d",$events->start_time)}}"  name="start_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名结束时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{date("Y-m-d",$events->end_time)}}" name="end_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">开奖时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" value="{{date("Y-m-d",$events->prize_time)}}" name="prize_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名人数限制</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  value="{{$events->num}}" name="num" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否已开奖</label>
            <div class="col-sm-10">
                <input type="radio"   name="is_prize" value="1">也开奖
                <input type="radio"   name="is_prize" value="0" checked>待开奖
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>




@endsection
