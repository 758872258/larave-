@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <form class="form-horizontal"  method="post"  >
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-2 control-label">权限名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="name" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">权限描述</label>
            <div class="col-sm-10">
                @foreach($permissions as $permission )
                <input type="checkbox" name="permission[]" value="{{$permission->id}}">{{$permission->intro}}
                    @endforeach
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">添加</button>
            </div>
        </div>
    </form>


@endsection