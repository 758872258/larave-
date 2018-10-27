@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <form class="form-horizontal"  method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">分类名称</label>
            <div class="col-sm-10">

                <input type="text" class="form-control"  name="name" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">分类图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="img" >

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态：1显示：0隐藏</label>
            <div class="col-sm-1">
                <input type="radio"   name="status"  checked value="1">显示
            </div>
            <div class="col-sm-1">
                <input type="radio" name="status"  value="0">隐藏
            </div>

        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>


@endsection