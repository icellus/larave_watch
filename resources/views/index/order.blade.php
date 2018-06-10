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


    <!-- banner -->
    <div class="watch-banner hidden-xs">
        <img src="images/banner.png">
        <div class="watch-banner-spirit">工匠精神 极致服务</div>
        <div class="watch-banner-repair">腕表维修 品质配件 直营保障 一年质保</div>
    </div>
    <!-- 专业团队 -->
    <div class="watch-team padding-mdLR0 hidden-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/icon.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">专业团队</div>
                    <div class="color-ash">原厂品质高级维修</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/qc.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">质检标准</div>
                    <div class="color-ash">杜绝任何遗漏故障</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/character.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">品质配件</div>
                    <div class="color-ash">高品质配件严格检验</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/quality.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">一年质保</div>
                    <div class="color-ash">原故障免费360天</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/priceTransparency.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">价格透明</div>
                    <div class="color-ash">维修费用公示</div>
                </div>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 工单详情 -->
    <div class="WorkOrderDetails">
        <div class="container-fluid WorkOrderDetails-list">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div class=""><a href="javascript:;">待维修<div></div></a></div>
                    <!-- WorkOrderDetails-active -->
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div><a href="javascript:;">已收货<div></div></a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div><a href="javascript:;">待确认<div></div></a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div><a href="javascript:;">维修中<div></div></a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div><a href="javascript:;">待付款<div></div></a></div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    <div><a href="javascript:;">已完成<div></div></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border-black2"></div>
    <!-- 具体内容 -->
    <div class="WorkOrderDetails-intial">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                    <div class="WorkOrderDetails-first-left color-ash">
                        <span>下单时间：</span>
                        <span>2018-04-26 16：56：58</span>
                    </div>
                    <div class="WorkOrderDetails-first-right">
                        <span><a href="#">工单详情</a></span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <!-- 线条 -->
                        <div class="watch-border-black2"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                    <div class="padding-left15 WorkOrderDetails-order color-ash">
                        <span>订单编号：</span>
                        <span>201872378237801919</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <!-- 线条 -->
                        <div class="watch-border-black2"></div>
                    </div>
                </div>
                <!-- 基本情况 -->
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-12 font-s16 padding-top15 color-six">基本情况</div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>机芯：</span><span>机械机芯</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>表壳：</span><span>18K金</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>字面：</span><span>多功能字画</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>表带：</span><span>18K金</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>重量：</span><span>119克（总重）</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                            <img src="images/watch-front.png" class="img-responsive">
                            <div class="color-ash">正面</div>
                        </div>
                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                            <img src="images/watch-reverse.png" class="img-responsive">
                            <div class="color-ash">反面</div>
                        </div>
                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                            <img src="images/watch-left.png" class="img-responsive">
                            <div class="color-ash">左侧</div>
                        </div>
                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                            <img src="images/wacth-right.png" class="img-responsive">
                            <div class="color-ash">右侧</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 color-ash"><span>备注：</span><span>手表壳翻新一下，其他小问题也处理一下</span></div>
                </div>
                <!-- 故障描述 -->
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                    <div class="col-xs-12 col-sm-12 col-md-12 font-s16 color-six">故障描述</div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>机芯：</span><span>慢</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>表壳：</span><span>翻新</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>表圈：</span><span>翻新</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>底盖：</span><span>更换</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>巴的：</span><span>定制</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>螺丝：</span><span>-</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>玻璃：</span><span>更换</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>字面：</span><span>后加钻</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>功能：</span><span>不防水了</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>备注：</span><span>这些小毛病挺多的处理好。</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>取货方式：</span><span>顺丰快递</span></div>
                </div>
                <!-- 联系方式 -->
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top30">
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 font-s16 color-six">联系方式</div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>姓名：</span><span>李贺龙</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>手机：</span><span>13760324350</span></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 padding-bot30 color-ash"><span>地址：</span><span>广东省 深圳市 罗湖区 水贝珠宝交易中心</span></div>
                </div>
            </div>
        </div>
        <!-- 线条 -->
        <div class="watch-border"></div>
        <!-- 维修情况 -->
        <div class="ConditionMaintenance">
            <div class="container-fluid">
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15 font-s16"><span class="color-six">维修情况</span><span class="color-ash">（维修完成组图）</span></div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top8">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <img src="images/watch-front.png" class="img-responsive padding-top8">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <img src="images/watch-front.png" class="img-responsive padding-top8">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <img src="images/watch-front.png" class="img-responsive padding-top8">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <img src="images/watch-front.png" class="img-responsive padding-top8">
                        </div>
                        <div class="col-xs-4 col-sm-2 col-md-2">
                            <img src="images/watch-front.png" class="img-responsive padding-top8">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>还货日期：</span><span>2018-04-26</span></div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 color-ash"><span>顺丰快递：</span><span>123456768765465</span></div>
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top8 padding-bot15 color-ash"><span>售后说明：</span><span>表壳保修一年，表带正常佩戴三个月内断带免费换新。
          </span></div>
            </div>
        </div>
    </div>
    <!-- 总体 -->
    <div class="watch-Totality">
        <!-- 待维修 -->
        <div class="watch-AwaitingRepair padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">尚未收货</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
                                <div class="color-ash">右侧</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 已收货 -->
        <div class="watch-Received padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">已收货</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
                                <div class="color-ash">右侧</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 待确认 -->
        <div class="watch-Confirmed padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">待确认</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
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
                            <span><a class="order-active" href="javascript:;">取消订单</a></span>
                            <span><a href="javascript:;">确认付款</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 维修中 -->
        <div class="watch-Maintenance padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">维修中</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
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
        </div>
        <!-- 待付款 -->
        <div class="watch-Obligation padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">待付款</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
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
        </div>
        <!-- 已完成 -->
        <div class="watch-Stocks padding-bot30 display-no">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">已完成</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
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
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left color-ash">
                            <span>下单时间：</span>
                            <span>2018-04-26 16：56：58</span>
                        </div>
                        <div class="WorkOrderDetails-first-right">
                            <span><a href="javascript:;">已取消</a></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top15 padding-bot15">
                        <div class="padding-left15 WorkOrderDetails-order color-ash">
                            <span>订单编号：</span>
                            <span>201872378237801919</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border-black2"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-front.png" class="img-responsive">
                                <div class="color-ash">正面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-reverse.png" class="img-responsive">
                                <div class="color-ash">反面</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/watch-left.png" class="img-responsive">
                                <div class="color-ash">左侧</div>
                            </div>
                            <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                <img src="images/wacth-right.png" class="img-responsive">
                                <div class="color-ash">右侧</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 clearfix padding-top30 padding-bot15">
                        <div class="WorkOrderDetails-first-left padding-top8">
                            <span class="color-red">费用合计：¥1200</span>
                            <span class="color-six">（注：该笔维修费用将在维修完成后收取）</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="row">
                            <!-- 线条 -->
                            <div class="watch-border"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection




{{--@section('page_js')--}}
{{--@endsection--}}