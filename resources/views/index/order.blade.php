@extends('layout.base')

@section('title','test')


@section('page_css')

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
    <!-- 工单详情 -->
    <div class="WorkOrderDetails">
        <div class="container-fluid WorkOrderDetails-list">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 0)class="WorkOrderDetails-active" @endif><a href="/order/0">待维修
                            <div></div>
                        </a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 1)class="WorkOrderDetails-active" @endif><a href="/order/1">已收货
                            <div></div>
                        </a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 2)class="WorkOrderDetails-active" @endif><a href="/order/2">待确认
                            <div></div>
                        </a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 3)class="WorkOrderDetails-active" @endif><a href="/order/3">维修中
                            <div></div>
                        </a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 4)class="WorkOrderDetails-active" @endif><a href="/order/4">待付款
                            <div></div>
                        </a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div @if($status == 5)class="WorkOrderDetails-active" @endif><a href="/order/5">已完成
                            <div></div>
                        </a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border-black2"></div>

    <!-- 总体 -->
    <div class="watch-Totality">
        @foreach ($orders as $order)
            <div data-id="{{$order->id}}" class="orderListPart">
                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                    <div class="padding-left15 WorkOrderDetails-order color-ash">
                        <span>订单编号：</span>
                        <span>201872378237801919</span>
                    </div>
                    <br>
                    <div class="WorkOrderDetails-first-left color-ash">
                        <span>下单时间：</span>
                        <span>2018-04-26 16：56：58</span>
                    </div>
                    <div class="WorkOrderDetails-first-right">
            <span>
                <a href="javascript:;">
                    @if($order->status == 0)
                        尚未收货
                    @elseif($status == 1)
                        已收货
                    @elseif($status == 2)
                        待确认
                    @elseif($status == 3)
                        维修中
                    @elseif($status == 4)
                        待付款
                    @elseif($status == 5)
                        @if($order->status == 5)
                            已完成
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
                <div class="watch-detail col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 display-no margin-bot60"
                     style="margin-bottom: 80px">
                @if($order->status == 0)
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

                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 故障描述 -->
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash">
                                        <span>取货方式：</span><span>
                                                @if($order->courier && $order->courier->type == 0)
                                                自取
                                            @else
                                                顺丰快递
                                            @endif
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
                @elseif($order->status == 1)
                    <!-- 已收货 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 2)
                    <!-- 待确认 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
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
                                        <span class="color-red" style="">费用合计：¥1200</span>
                                        <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                                    </div>
                                    <div class="WorkOrderDetails-first-right order-Cancel-determine padding-top8">
                                        <span><a class="order-active" href="javascript:;">取消订单</a></span>
                                        <span><a href="javascript:;">确认付款</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 3)
                    <!-- 维修中 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
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
                                        <span class="color-red">费用合计：¥1200</span>
                                        <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                                    </div>
                                    <div class="WorkOrderDetails-first-right order-Cancel-determine padding-top8">
                                        <span><a href="javascript:;">取消订单</a></span>
                                        <span><a href="javascript:;">确认付款</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 4)
                    <!-- 待付款 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
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
                                        <span class="color-red">费用合计：¥1200</span>
                                        <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                                    </div>
                                    <div class="WorkOrderDetails-first-right order-Cancel-determine padding-top8">
                                        <span><a href="javascript:;">取消订单</a></span>
                                        <span><a class="order-active" href="javascript:;">确认付款</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($order->status == 5)
                    <!-- 已完成 -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-front.png" class="img-responsive">
                                            <div class="color-ash">正面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-reverse.png" class="img-responsive">
                                            <div class="color-ash">反面</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/watch-left.png" class="img-responsive">
                                            <div class="color-ash">左侧</div>
                                        </div>
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="/images/wacth-right.png" class="img-responsive">
                                            <div class="color-ash">右侧</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                                    <div class="WorkOrderDetails-first-left padding-top8">
                                        <span class="color-red">费用合计：¥1200</span>
                                        <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <!-- 线条 -->
                        <div class="watch-border-black2"></div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>



@endsection




{{--@section('page_js')--}}
{{--@endsection--}}