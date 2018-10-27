@extends("layouts.main")

@section("title","商品添加")

@section("content")

    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        {{csrf_field()}}


        <div class="form-group">
            <label class="col-sm-2 control-label">菜品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="goods_name" value="{{$menus->goods_name}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">菜品评分</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="rating" value="{{$menus->rating}}" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">所属分类</label>
            <div class="col-sm-10">
                <select name="category_id">
                    @foreach($menucategorys as $menucategory)
                        <option value="{{$menucategory->id}}">{{$menucategory->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">价格</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="goods_price" value="{{$menus->goods_price}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
                <textarea rows="5"  class="form-control" name="description" >{{$menus->description}}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">月销量</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="month_sales" value="{{$menus->month_sales}}" >
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">评分数量</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="rating_count" value="{{$menus->rating_count}}" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">提示信息</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="tips" value="{{$menus->tips}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">满意度数量</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="satisfy_count" value="{{$menus->satisfy_count}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">满意度评分</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name="satisfy_rate" value="{{$menus->satisfy_rate}}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control"  name="goods_img" value="{{$menus->goods_img}}" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">状态</label>
            <div class="col-sm-10">
                <input type="radio"   name="status"  value="1" checked>上架
                <input type="radio" name="status" value="0">下架
            </div>
        </div>




        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">修改</button>
            </div>
        </div>
    </form>


@endsection