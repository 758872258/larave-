@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <form class="form-horizontal"  method="post">
        {{csrf_field()}}
        <div class="form-group" class="btn-success">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
                <a href="{{}}"><input type="button" class="form-control"  name="name" value="注册商铺" ></a>
            </div>
        </div>

    </form>


@endsection