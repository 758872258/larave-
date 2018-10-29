@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="title" value="{{$Activity->title}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">活动详情</label>
            <div class="col-sm-10">
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var ue = UE.getEditor('container');
                    ue.ready(function() {
                        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                    });
                </script>

                <!-- 编辑器容器 -->
                <script id="container" name="content" type="text/plain" > {{$Activity->content}}</script>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">活动开始时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control"  name="start_time"  value="{{$Activity->start_time}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">活动结束时间</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control"  name="end_time"  value="{{$Activity->end_time}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>




@endsection