@extends('layouts.admin-app')

@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-edit"></i> 维修工单 <span>修改价格</span></h2>
        {!! Breadcrumbs::render('admin-goods-price-page') !!}
    </div>

    <div class="contentpanel">

        <div class="row">

            <div class="col-sm-12 col-lg-112">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="panel-close">×</a>
                            <a href="" class="minimize">−</a>
                        </div>
                        <h4 class="panel-title">修改价格</h4>
                    </div>

                    <form class="form-horizontal form-bordered"
                          action="{{ route('admin.goods.price') }}" method="POST">

                        <input type="hidden" name="id" value="{{$order->id}}">
                        <div class="panel-body panel-body-nopadding">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">当前价格：</label>

                                <div class="col-sm-6 control-label" style="text-align: inherit">
                                    ￥{{ number_format($order->price / 100 ,2) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">修改价格：</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="price"
                                           value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">修改备注：</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="comment"
                                           value="">
                                </div>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <button class="btn btn-primary">保存</button>
                                    &nbsp;
                                    <button class="btn btn-default">取消</button>
                                </div>
                            </div>
                        </div><!-- panel-footer -->

                    </form>
                </div>

            </div><!-- col-sm-9 -->

        </div><!-- row -->

    </div>
@endsection
