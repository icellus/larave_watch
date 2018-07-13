@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-print"></i> 维修工单 <span>工单详情</span></h2>
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
                                            <span class="badge badge-info">已提交价格，待客户确认</span>
                                        @elseif($order->status == 3)
                                            <span class="badge badge-info">客户已确认，维修中</span>
                                        @elseif($order->status == 4)
                                            <span class="badge badge-info">维修已完成，待付款</span>
                                        @elseif($order->status == 5)
                                            <span class="badge badge-info">客户已付款，待发货</span>
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
                                    <div class="col-xs-6">
                                        <a href="{{ route('admin.goods.price.history',['id'=>$order->id]) }}">
                                            <button class="btn btn-primary price-button" type="button"
                                                    style="line-height: 13px">
                                                <i class="fa mr5"></i>查看价格修改记录
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="btn-group mr10">
                                            @if($order->status == 2)
                                                <a href="javascript:;">
                                                    <button class="btn btn-primary price-button" type="button"
                                                            style="line-height: 13px" id="submit-price">
                                                        <i class="fa mr5"></i>确认价格
                                                    </button>
                                                </a>
                                            @endif
                                            <a href="/admin/goods/price/page?id={{$order->id}}">
                                                @if($order->price == 0 && $order->status == 1)
                                                    <button class="btn btn-primary price-button" type="button"
                                                            style="line-height: 13px">
                                                        <i class="fa fa-pencil mr5"></i>提交订单价格
                                                    </button>
                                                @elseif($order->price > 0 && $order->status < 3 )
                                                    <button class="btn btn-primary price-button" type="button"
                                                            style="line-height: 13px">
                                                        <i class="fa fa-pencil mr5"></i>修改订单价格
                                                    </button>
                                                @elseif($order->status > 2 && $order->status < 4)
                                                    <button class="btn btn-primary price-button" type="button"
                                                            style="line-height: 13px">
                                                        <i class="fa fa-pencil mr5"></i>额外维修费用
                                                    </button>
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-12">重量：{{$watch['height']}}克</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">客户备注：{{$watch['watch_comment']}}</div>
                        </div>

                        <br/>

                        <h5 class="subtitle subtitle-lined">腕表详情组图：</h5>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                    @foreach ($images[1] as $k => $v)
                                        <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                            <img src="{{$v->img_url}}" class="img-responsive" style="max-width: 150px;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <br>

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

                        <h5 class="subtitle subtitle-lined">取货方式：</h5>
                        <div class="row">
                            @foreach($courier as $k => $v)
                                @if($v->payment_type == 1)
                                    @if($v->type == 0)
                                        <div class="col-sm-6">
                                            快递方式：展厅自取
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
                        </div>
                        <br/>


                        <h5 class="subtitle subtitle-lined">客户信息：</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="col-xs-6">
                                    姓名：{{$user->username}}
                                </div><!-- col-sm-6 -->
                                <div class="col-xs-6">
                                    联系方式：{{$user->phone}}
                                </div><!-- col-sm-6 -->
                                <div class="col-xs-6">
                                    地址：{{$watch['province']}}{{$watch['city']}}{{$watch['district']}}
                                </div><!-- col-sm-6 -->
                                <div class="col-xs-6">
                                    详细地址：{{$watch['area']}}
                                </div>
                            </div>
                        </div><!-- row -->
                        <br/>

                        @if($order->status >= 3)
                            <h5 class="subtitle subtitle-lined">维修完成组图：</h5>
                            @if($order->status == 3 && !$images[2])
                                <div class="row">
                                    <div class="order-image-box"
                                         style="text-align: center;width: 88%;height: 120px;margin: 15px 0 15px 0;">
                                        <div class=" image-box ">
                                            <section class="upload-section" style="margin:15px 10px 0 0">
                                                <div class="upload-btn"></div>
                                            </section>
                                        </div>
                                        <div class=" image-box ">
                                            <section class="upload-section" style="margin:15px 10px 0 0">
                                                <div class="upload-btn"></div>

                                            </section>
                                        </div>
                                        <div class=" image-box ">
                                            <section class="upload-section" style="margin:15px 10px 0 0">
                                                <div class="upload-btn"></div>

                                            </section>
                                        </div>
                                        <div class=" image-box ">
                                            <section class="upload-section" style="margin:15px 10px 0 0">
                                                <div class="upload-btn"></div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group mr10">
                                    <button class="btn btn-primary order-image" type="button"><i
                                                class="fa mr5"></i> 上传维修组图
                                    </button>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 padding-bot15">
                                        <div class="col-xs-12 col-sm-12 col-md-12 padding-mdLR0 watch-frot-text padding-top15">
                                            @foreach ($images[2] as $k => $v)
                                                <div class="col-xs-6 col-sm-2 col-md-2 padding-top8">
                                                    <img src="{{$v->img_url}}" class="img-responsive"
                                                         style="max-width: 150px;">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <br/>
                        @endif

                        @if($comment)
                            <h5 class="subtitle subtitle-lined">工单备注：</h5>
                            <div class="row">
                                @foreach($comment as $v)
                                    <div class="col-sm-12">{{$v->created_at}}:
                                        &nbsp;&nbsp;&nbsp;&nbsp;{{$v->value}}</div>
                                @endforeach
                            </div>
                        @endif

                        {{--@if($order->status >= 5 && $order->status != 7)--}}
                        {{--<h5 class="subtitle subtitle-lined">取货方式：</h5>--}}
                        {{--<div class="row">--}}
                        {{--@foreach($courier as $k => $v)--}}
                        {{--@if($v->payment_type == 1)--}}
                        {{--@if($v->type == 0)--}}
                        {{--<div class="col-xs-6">--}}
                        {{--快递方式：自取--}}
                        {{--</div>--}}
                        {{--@else--}}
                        {{--<div class="col-xs-6">--}}
                        {{--快递方式：顺丰快递--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-6">--}}
                        {{--快递单号：{{$v->number}}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <br/>
                        <div class="btn-group mr10">
                            <a href="javascript:;">
                                <button class="btn btn-primary comment-order" type="button">
                                    <i class="fa fa-pencil mr5"></i>添加备注
                                </button>
                            </a>
                        </div>
                        @if($order->status == 5)
                            <div class="btn-group mr10">
                                <a href="{{ route('admin.goods.courier',['id' => $order->id]) }}">
                                    <button class="btn btn-primary courier-submit" type="button"><i
                                                class="fa fa-pencil mr5"></i> 填写发货信息
                                    </button>
                                </a>
                            </div>
                        @endif
                        <div class="btn-group mr10">
                            @if($order->status == 0)
                                <a href="javascript:;">
                                    <button class="btn btn-primary order-submit" type="button"><i
                                                class="fa fa-pencil mr5"></i> 确认收货
                                    </button>
                                </a>
                            @elseif($order->status == 3)
                                <a href="javascript:;">
                                    <button class="btn btn-primary order-submit" type="button"><i
                                                class="fa fa-pencil mr5"></i> 维修完成
                                    </button>
                                </a>
                            @elseif($order->status == 4)
                                <a href="javascript:;">
                                    <button class="btn btn-primary order-pay-submit" type="button"><i
                                                class="fa fa-pencil mr5"></i> 确认付款
                                    </button>
                                </a>
                            @elseif($order->status == 5)
                                <a href="javascript:;">
                                    <button class="btn btn-primary order-submit" type="button"><i
                                                class="fa fa-pencil mr5"></i> 完成订单
                                    </button>
                                </a>
                            @endif
                        </div>

                        <div class="btn-group mr10">
                            @if($order->status < 5)
                                <a href="javascript:;">
                                    <button class="btn btn-default close-order" type="button">取消订单</button>
                                </a>
                            @endif
                        </div>
                    </div>
                </div><!-- row -->

            </div><!-- panel-body -->
        </div><!-- panel -->

    </div>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">
        $(".order-submit").click(function () {
            Rbac.ajax.request({
                type: 'POST',
                href: '/admin/goods/submit',
                data: {
                    id: $("input[name='id']").val()
                }
            });
        });
        $(".order-pay-submit").click(function () {
            Rbac.ajax.request({
                type: 'POST',
                href: '/pay',
                data: {
                    id: $("input[name='id']").val()
                }
            });
        });
        $("#submit-price").click(function () {
            Rbac.ajax.request({
                type: 'POST',
                href: '/order/submit',
                data: {
                    id: $("input[name='id']").val()
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
        $(".comment-order").click(function () {
            swal({
                    title: "添加备注",
                    text: "添加工单备注",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "请输入备注"
                },
                function (inputValue) {
                    if (inputValue === false) return false;
                    if (inputValue === "") {
                        swal.showInputError("你需要输入一些话！");
                        return false
                    }

                    var id = $("input[name='id']").val();
                    var value = inputValue;
                    Rbac.ajax.request({
                        type: 'POST',
                        href: '/admin/goods/comment',
                        data: {
                            id: id,
                            value: value,
                        }
                    });
                });
        });


        $(".order-image").click(function () {
            //手表照片上传
            $('.order-image-box').find('.image-box .upload-section').each(function () {
                var _this = this;

                var image_section = $(_this).find('.image-section');
                if (image_section.length === 0)//未选择图片
                    return;

                var img = image_section.find('img.image-show');
                if (img.attr('src').substring(0, 10) !== 'data:image')//data:image开头表示还未上传
                    return;//图片已上传跳出本次循环

                //开始上传
                var formData = new FormData();
                var fileData = $(_this).closest('.upload-section').find('.upload-btn input[type="file"]').get(0).files[0];//取得该input框中文件对象
                formData.append('image', fileData);
                formData.append('id', {{$watch['id']}});
                img.hide();//隐藏图片
                image_section.find('.image-delete').hide();//隐藏删除图标
                $(_this).addClass('image-loading');//显示loading
                $.ajax({
                    url: '/admin/image',
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        $(_this).removeClass('image-loading');
                        img.attr('src', data.data.src).show();
                        image_section.removeClass('waiting-upload').find('.image-delete').show();//去掉图片还未上传标志，隐藏删除图标
                        if ($(_this).closest('.order-image-box').find('.image-section.waiting-upload').length === 0)//图片上传完毕
                        {
                            window.location.reload();
                            return false;
                        }
                    },
                    error: function (e) {
                        imageSection.remove();
                        imageBox.children('.image-section').show();
                        // 执行失败回调函数
                        var callback = config.error;
                        callback(e);

                    }
                });

            });

        });


        // $(".price-button").click(function () {
        //     swal({
        //             title: "修改价格",
        //             text: "请输入价格",
        //             type: "input",
        //             showCancelButton: true,
        //             closeOnConfirm: false,
        //             animation: "slide-from-top",
        //             inputPlaceholder: 0
        //         },
        //         function (inputValue) {
        //             if (inputValue === false || inputValue < 0 || inputValue === "") {
        //                 swal.showInputError("请输入一个价格！");
        //                 return false
        //             }
        //
        //             $.ajax({
        //                 url: '/admin/goods/price',
        //                 type: "POST",
        //                 data: {
        //                     id: $("input[name='id']").val(),
        //                     price: inputValue
        //                 },
        //                 dataType: 'json',
        //                 success: function (data) {
        //                     if (data.code == 0) {
        //                         swal('操作成功');
        //                     } else {
        //                         swal('操作失败');
        //                     }
        //                     return false;
        //                 },
        //                 error: function (e) {
        //                     swal('操作失败');
        //                 }
        //             });
        //         });
        // })
        //
        // $(".price-button").click(function () {
        //     swal({
        //         title: '请输入价格',
        //         html:
        //
        //
        //         '<div style="text-align: left">' +
        //         '修改备注</div><input id="swal-input1" class="swal2-input" style="float: right;width: 70%"><br/>' +
        //         '<div style="text-align: left">价格</div><input id="swal-input2" class="swal2-input" style="float: right;width: 70%">',
        //         preConfirm: function () {
        //             return new Promise(function (resolve,reject) {
        //                 resolve([
        //                     $('#swal-input1').val(),
        //                     $('#swal-input2').val()
        //                 ])
        //             })
        //         },
        //         onOpen: function () {
        //             $('#swal-input1').focus()
        //         },
        //         showCancelButton:true
        //     }).then(function (result) {
        //         var value = result.value;
        //         var id = value[0];
        //         var inputValue = value[1];
        //         if (inputValue === false || inputValue < 0 || inputValue === "" || !inputValue) {
        //             swal('请输入一个有效价格');
        //             return false
        //         }
        //
        //         $.ajax({
        //             url: '/admin/goods/price',
        //             type: "POST",
        //             data: {
        //                 id: $("input[name='id']").val(),
        //                 price: inputValue
        //             },
        //             dataType: 'json',
        //             success: function (data) {
        //                 if (data.code == 0) {
        //                     swal('操作成功');
        //                 } else {
        //                     swal('操作失败');
        //                 }
        //                 return false;
        //             },
        //             error: function (e) {
        //                 swal('操作失败');
        //             }
        //         });
        //     })
        // })
    </script>

@endsection
