@extends("layouts.main")

@section("title","商户注册")

@section("content")

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>

                            <th>订单总数</th>
                            <th>收入</th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->nums}}</td>
                                <td>{{$order->money}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection