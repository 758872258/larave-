@extends("layouts.main")

@section("title","商品详情")

@section("content")

    <a href="{{url()->previous()}}">返回</a>
    <h1>{{$good->name}}</h1>

    <p>
        {{$good->content}}
    </p>
@endsection