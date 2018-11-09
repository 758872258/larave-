@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <form method="post">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">名称</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label for="url">路由</label>
            <select name="url" id="" class="form-control">
                <option value="">无</option>
                @foreach($urls as $url)
                    <option value="{{$url}}">{{$url}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sort">排序</label>
            <input type="text" class="form-control" id="sort" name="sort" value="{{old('sort',100)}}">
        </div>
        <div class="form-group">
            <label for="pid">父级id</label>
            <select name="pid" id="" class="form-control">
                <option value="0">顶级菜单</option>
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>



@endsection