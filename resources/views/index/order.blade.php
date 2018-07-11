@extends('layout.base')

@section('title','test')


@section('page_css')

    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <!-- 通用 -->
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <!-- style -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    {{--<style type="text/css">
        @media (max-width: 768px){
            body{
                font-family:PingFangSC-Light,helvetica neue,hiragino sans gb,arial,microsoft yahei ui,microsoft yahei,simsun,sans-serif;
                font-size: 14px;
                padding-bottom: 80px;
                padding-top: 50px;
            }
        }
    </style>--}}
@endsection


@section('content')
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top new-service-order">
        <div class="container">
            <div class="row nav-top">
                <ul class="list-inline">
                    <li @if($status == 0)class="new-service-order-active" @endif>
                        <a href="/order/0">
                            待维修
                        </a>
                    </li>
                    <li @if($status == 1)class="new-service-order-active" @endif>
                        <a href="/order/1">
                            已收货
                        </a>
                    </li>
                    <li @if($status == 2)class="new-service-order-active" @endif>
                        <a href="/order/2">
                            待确认
                        </a>
                    </li>
                    <li @if($status == 3)class="new-service-order-active" @endif>
                        <a href="/order/3">
                            维修中
                        </a>
                    </li>
                    <li @if($status == 4)class="new-service-order-active" @endif>
                        <a href="/order/4">
                            待付款
                        </a>
                    </li>
                    <li @if($status == 5)class="new-service-order-active" @endif>
                        <a href="/order/5">
                            已完成
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->

    <!-- 总体 -->
    <div class="watch-Totality">
        @foreach ($orders as $order)
            <div data-id="{{$order->id}}" class="orderListPart" style="position: relative;">

                <div class="order-list-header">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>{{$order->uid}}</span>
                        </div>
                        <br>
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>{{$order->created_at}}</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                    <span>
                        <a href="javascript:;">
                            @if($order->status == 0)
                                待商家确认收货
                            @elseif($status == 1)
                                商家已收货
                            @elseif($status == 2)
                                待确认价格
                            @elseif($status == 3)
                                维修中
                            @elseif($status == 4)
                                待付款
                            @elseif($status == 5)
                                @if($order->status == 5)
                                    已完成，待确认收货
                                @elseif($order->status == 6)
                                    已完成
                                @elseif($order->status == 7)
                                    已取消
                                @endif
                            @endif
                        </a>
                    </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                </div>

                <div class="watch-detail col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 display-no margin-bot60"
                     style="margin-bottom: 80px">
                @if($order->status == 0)
                    <!-- 具体内容 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                </div>
                                <!-- 基本情况 -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        @foreach ($order->images[1] as $k => $v)
                                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                                <img src="{{$v->img_url}}" class="img-responsive"
                                                     style="max-width: 102px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- 故障描述 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>取货方式：</span><span>
                                                    @foreach ($order->courier as $courier)
                                                @if($courier->payment_type == 0)
                                                    @if($courier->type == 0)
                                                        自取
                                                    @else
                                                        顺丰快递
                                                    @endif
                                                @endif
                                            @endforeach
                                                    </span>
                                    </div>
                                </div>
                                <!-- 联系方式 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 font-s16 color-six">联系方式
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>姓名：</span><span>{{$order->user->username}}</span></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>手机：</span><span>{{$order->user->phone}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 padding-bot30 color-ash">
                                        <span>地址：</span><span>{{$order->watch['province']}} {{$order->watch['city']}} {{$order->watch['district']}} {{$order->watch['area']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 1)
                    <!-- 具体内容 -->
                        <div class="container-fluid">
                            <div class="row">
                                <!-- 基本情况 -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                    </div>
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>
                                </div>
                                <!-- 故障描述 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>取货方式：</span><span>
                                                    @foreach ($order->courier as $courier)
                                                @if($courier->payment_type == 0)
                                                    @if($courier->type == 0)
                                                        自取
                                                    @else
                                                        顺丰快递
                                                    @endif
                                                @endif
                                            @endforeach
                                                    </span></div>
                                </div>
                                <!-- 联系方式 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 font-s16 color-six">联系方式
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>姓名：</span><span>{{$order->user->username}}</span></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>手机：</span><span>{{$order->user->phone}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 padding-bot30 color-ash">
                                        <span>地址：</span><span>{{$order->watch['province']}} {{$order->watch['city']}} {{$order->watch['district']}} {{$order->watch['area']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 2)
                    <!-- 待确认 -->
                        <div class="container-fluid">
                            <div class="row">
                                <!-- 基本情况 -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                    </div>
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <!-- 线条 -->
                                        <div class="watch-border-black2"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                                    <div class="WorkOrderDetails-first-left padding-top8">
                                                <span class="color-red"
                                                      style="">费用合计：¥{{number_format($order->price / 100,2)}}</span>
                                        <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                                    </div>
                                    <div class="WorkOrderDetails-first-right order-Cancel-determine padding-top8">
                                                <span><a class="order-active order-close" data-id="{{$order->id}}"
                                                         href="javascript:;">取消订单</a></span>
                                        <span><a class="order-submit" data-id="{{$order->id}}" href="javascript:;"
                                                 style="color: darkgreen;border: 1px solid darkgreen;">确认价格</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 3)
                    <!-- 维修中 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                </div>
                                <!-- 基本情况 -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>
                                </div>

                                <!-- 联系方式 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 font-s16 color-six">联系方式
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>姓名：</span><span>{{$order->user->username}}</span></div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>手机：</span><span>{{$order->user->phone}}</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 padding-bot30 color-ash">
                                        <span>地址：</span><span>{{$order->watch['province']}} {{$order->watch['city']}} {{$order->watch['district']}} {{$order->watch['area']}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                @elseif($order->status == 4)
                    <!-- 待付款 -->
                        <div class="container-fluid">
                            <div class="row"> <!-- 基本情况 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        {{--todo 添加卖家备注--}}
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <!-- 线条 -->
                                        <div class="watch-border-black2"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                    <span>维修完成组图</span>
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        @foreach ($order->images[2] as $k => $v)
                                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                                <img src="{{$v->img_url}}" class="img-responsive"
                                                     style="max-width: 102px">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <!-- 线条 -->
                                        <div class="watch-border-black2"></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                                    <div class="WorkOrderDetails-first-left padding-top8">
                                        <span class="color-red">费用合计：¥{{number_format($order->price / 100,2)}}</span>
                                    </div>
                                    <div class="WorkOrderDetails-first-right order-Cancel-determine padding-top8  order-pay"
                                         data-id="{{$order->id}}">
                                        <span><a class="order-active" href="javascript:;">确认付款</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status >= 5)
                    <!-- 已完成 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    @foreach ($order->watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        {{--todo 添加卖家备注--}}
                                        <span>备注：</span><span>{{$order->watch['error_comment']}}</span>
                                    </div>
                                </div>

                                <br/>
                                @if($order->status == 5)
                                    <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">快递信息
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                            <span>取货方式：</span><span>
                                                    @foreach ($order->courier as $courier)
                                                    @if($courier->payment_type == 0)
                                                        @if($courier->type == 0)
                                                            自取
                                                        @else
                                                            顺丰快递
                                                        @endif
                                                    @endif
                                                @endforeach
                                                    </span>
                                        </div>
                                    </div>
                                    <br/>
                                @endif
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="row">
                                        <!-- 线条 -->
                                        <div class="watch-border-black2"></div>
                                    </div>
                                </div>
                                @if($order->status < 7)
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                        <span>维修完成组图</span>
                                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                            @foreach ($order->images[2] as $k => $v)
                                                <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                                    <img src="{{$v->img_url}}" class="img-responsive"
                                                         style="max-width: 102px">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row">
                                            <!-- 线条 -->
                                            <div class="watch-border-black2"></div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15">
                                    <div class="WorkOrderDetails-first-left padding-top8">
                                        <span class="color-red">费用合计：¥{{number_format($order->price /100 ,2)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>
        @endforeach
    </div>


    <!-- 登录框 -->
    @if(session('user_id')  == null)
        <div class="new-login-bg"></div>
        <div class="new-login">
            <div class="new-login-header">
                验证码登录
                <span>X</span>
            </div>
            <div class="new-login-cont">
                <input type="text" name="phone" placeholder="手机号">
                <div class="new-login-code">
                    <input type="text" name="imgcode" placeholder="图形验证">
                    <img src="http://cui.jinjifu.com/captcha/default?kNFUPhpD"  id = 'img-captcha'>
                </div>
                <div class="new-login-code">
                    <input type="text" name="code" placeholder="短信验证">
                    <div><a href="javascript:;" class="SendCode">发送验证码</a></div>
                </div>
                <button>登录</button>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row">
        </div>
    </div>

@endsection




@section('page_js')
    <script>
        $('.order-close').click(function () {
            var id = $(this).data('id');
            $.post('/order/close', {id: id}, function (data) {
                window.location.href = '/order/5';
            })
        })
        $('.order-submit').click(function () {
            var id = $(this).data('id');
            $.post('/order/submit', {id: id}, function (data) {
                window.location.href = '/order/3';
            })
        })
        $('.order-pay').click(function () {
            var id = $(this).data('id');
            $.post('/pay', {id: id}, function (data) {
                if (data.code == 0) {
                    window.location.href = '/order/5';
                }
            })
        })
    </script>
@endsection