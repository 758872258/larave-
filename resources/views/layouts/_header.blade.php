<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">后台管理系统</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav">
                                  @foreach(\App\Models\Nav::where("pid",0)->get() as $k1=>$v1)
                                         <li class="dropdown">
                                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                       22                             aria-expanded="false">{{$v1->name}} <span class="caret"></span></a>
                                             <ul class="dropdown-menu">


                                                          @foreach(\App\Models\Nav::where("pid",$v1->id)->get() as $k2=>$v2)
                                                              <li><a href="{{route($v2->url)}}">{{$v2->name}}</a></li>
                                                               @endforeach
                                                      </ul>
                                              </li>
                                      @endforeach
                              </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">首页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">登录/注册 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route("shop.user.login")}}">商家登录</a></li>
                        <li><a href="{{route("shop.user.register")}}">没有账号？注册</a></li>
                        <li><a href="#">退出</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route("admin.admin.login")}}">管理员登录</a></li>
                        <li><a href="{{route("admin.admin.register")}}">管理员注册</a></li>
                        <li><a href="#">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>