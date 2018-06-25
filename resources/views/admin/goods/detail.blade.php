@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>维修工单</span></h2>
        {!! Breadcrumbs::render('admin-goods-detail') !!}
    </div>


    <div class="contentpanel">

        <div class="panel">
            <div class="panel-heading">
                <h5 class="bug-key-title">维修工单</h5>
                <input type="hidden" name="id" value="{{$order->id}}">
                <div class="panel-title">订单号：{{$order->uid}}</div>
            </div><!-- panel-heading-->
            <div class="panel-body">

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="subtitle subtitle-lined">腕表详情</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    @foreach ($watch['watch'] as $k => $v)
                                        <div class="col-xs-6">
                                            <span>{{$k}}：</span><span>{{$v}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- col-sm-6 -->
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-xs-6">
                                        订单状态： @if($order->status == 0)
                                            <span class="badge badge-info">尚未收货</span>
                                        @elseif($order->status == 1)
                                            <span class="badge badge-info">已收货，待补充价格</span>
                                        @elseif($order->status == 2)
                                            <span class="badge badge-info">已提交价格，待买家确认</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-info">买家已确认，维修中</span>
                                        @elseif($order->status == 4)
                                            <span class="badge badge-info">维修已完成，待付款</span>
                                        @elseif($order->status == 5)
                                            <span class="badge badge-info">买家已付款，待发货</span>
                                        @elseif($order->status == 6)
                                            <span class="badge badge-info">已完成</span>
                                        @elseif($order->status == 7)
                                            <span class="badge badge-info">已取消</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row" style="padding: 10px 0 10px 0;">
                                    <div class="col-xs-6">
                                        订单价格：￥{{number_format($order->price / 100,2)}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="btn-group mr10">
                                            @if($order->price == 0)
                                                <button class="btn btn-primary price-button" type="button"
                                                        style="line-height: 13px">
                                                    <i class="fa fa-pencil mr5"></i>提交订单价格
                                                </button>
                                            @elseif($order->price > 0 && $order->status == 2)
                                                <button class="btn btn-primary price-button" type="button"
                                                        style="line-height: 13px">
                                                    <i class="fa fa-pencil mr5"></i>修改订单价格
                                                </button>
                                            @elseif($order->status > 2)
                                                <button class="btn btn-primary price-button" type="button"
                                                        style="line-height: 13px">
                                                    <i class="fa fa-pencil mr5"></i>额外维修费用
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                        <div class="row">
                            <div class="col-sm-12">描述：{{$watch['watch_comment']}}</div>
                        </div>

                        <br/>

                        <h3 class="subtitle subtitle-lined">故障详情</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    @foreach ($watch['error'] as $k => $v)
                                        <div class="col-xs-6">
                                            <span>{{$k}}：</span><span>{{$v}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-12">故障描述：{{$watch['error_comment']}}</div>
                        </div>

                        <br/>
                        <h5 class="subtitle subtitle-lined">地址信息：</h5>
                        <div class="row">
                            <div class="col-xs-6">
                                地址：{{$watch['province']}}{{$watch['city']}}{{$watch['district']}}
                            </div><!-- col-sm-6 -->
                            <div class="col-xs-6">
                                详细地址：{{$watch['area']}}
                            </div>
                        </div><!-- row -->
                        <br/>
                        <h5 class="subtitle subtitle-lined">取货方式：</h5>
                        <div class="row">
                            @foreach($courier as $k => $v)
                                @if($v->payment_type == 0)
                                    @if($v->type == 0)
                                        <div class="col-xs-6">
                                            快递方式：自取
                                        </div>
                                    @else
                                        <div class="col-xs-6">
                                            快递方式：顺丰快递
                                        </div>
                                        <div class="col-xs-6">
                                            快递单号：{{$v->number}}
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div><!-- row -->

                        <br/><br/>
                        @if($order->status == 5)
                            <div class="btn-group mr10">
                                <button class="btn btn-primary courier-submit" type="button"><i
                                            class="fa fa-pencil mr5"></i> 填写发货单号
                                </button>
                            </div>
                        @endif
                        <div class="btn-group mr10">
                            @if($order->status == 0)
                                <button class="btn btn-primary order-submit" type="button"><i
                                            class="fa fa-pencil mr5"></i> 确认收货
                                </button>
                            @elseif($order->status == 3)
                                <button class="btn btn-primary order-submit" type="button"><i
                                            class="fa fa-pencil mr5"></i> 维修完成
                                </button>
                            @elseif($order->status == 5)
                                <button class="btn btn-primary order-submit" type="button"><i
                                            class="fa fa-pencil mr5"></i> 完成订单
                                </button>
                            @endif
                        </div>

                        <div class="btn-group mr10">
                            @if($order->status < 6)
                                <button class="btn btn-default close-order" type="button">取消订单</button>
                            @endif
                        </div>
                    </div>
                </div><!-- row -->

            </div><!-- panel-body -->
        </div><!-- panel -->

    </div><!-- contentpanel -->
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">
        $(".reserve-handle").click(function () {
            Rbac.ajax.request({
                type: 'POST',
                href: '/admin/goods/submit',
                data: {
                    id: $("input[name='id']").val(),
                }
            });
        });
        $(".close-order").click(function () {
            Rbac.ajax.delete({
                confirmTitle: '确认取消订单吗？',
                successTitle: '取消成功',
                errorFnc: function () {
                    swal('操作失败', '', 'error');
                },
                type: 'POST',
                href: '/admin/goods/close',
                data: {
                    id: $("input[name='id']").val(),
                }
            });
        });
        // todo 发货
        $(".courier-submit").click(function () {
            Rbac.ajax.delete({
                confirmTitle: '确认取消订单吗？',
                successTitle: '取消成功',
                errorFnc: function () {
                    swal('操作失败', '', 'error');
                },
                type: 'POST',
                href: '/admin/goods/close',
                data: {
                    id: $("input[name='id']").val(),
                }
            });
        });

        $(".price-button").click(function () {
            swal({
                    title: "修改价格",
                    text: "请输入价格",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: 0
                },
                function (inputValue) {
                    if (inputValue === false || inputValue < 0 || inputValue === "") {
                        swal.showInputError("请输入一个价格！");
                        return false
                    }

                    $.ajax({
                        url: '/admin/goods/price',
                        type: "POST",
                        data: {
                            id: $("input[name='id']").val(),
                            price: inputValue
                        },
                        dataType: 'json',
                        success: function (data) {
                            if (data.code == 0) {
                                swal('操作成功');
                            } else {
                                swal('操作失败');
                            }
                            return false;
                        },
                        error: function (e) {
                            swal('操作失败');
                        }
                    });
                });
        })
    </script>

@endsection
