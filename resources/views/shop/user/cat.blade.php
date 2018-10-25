@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <form class="form-horizontal"  method="post">
        {{csrf_field()}}
        <div class="form-group" class="btn btn-success">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
                <a href="{{route("shop.shop.add")}}"><input type="button" class="btn btn-success form-control"  name="name" value="没有商铺->注册" ></a>
            </div>
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-2">
                <a href="{{route("shop.user.login")}}"><input type="button" class="btn btn-success form-control"  name="name" value="也有商铺->登陆" ></a>


        </div>

    </form>


@endsection