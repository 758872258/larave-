@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="title" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <textarea rows="5" class="form-control"  name="content">

                </textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名开始时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control"  name="start_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名结束时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control"  name="end_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">开奖时间</label>
            <div class="col-sm-10">
                <input type="date" class="form-control"  name="prize_time" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">报名人数限制</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="num" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否已开奖</label>
            <div class="col-sm-10">
                <input type="radio"   name="is_prize" value="0" checked>待开奖
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>




@endsection
