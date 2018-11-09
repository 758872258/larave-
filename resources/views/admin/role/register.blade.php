@extends("layouts.main")

@section("title","管理员登陆")

@section("content")

    <form class="form-horizontal"  method="post" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">管理员名称</label>
            <div class="col-sm-10">

                <input type="text" class="form-control"  name="name"  >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">管理员邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control"  name="email" >

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">管理员密码</label>
            <div class="col-sm-10">
                <input type="password"   name="password" class="form-control" >
            </div>


        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">注册</button>
            </div>
        </div>
    </form>


@endsection