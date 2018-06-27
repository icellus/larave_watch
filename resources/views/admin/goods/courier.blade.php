@extends('layouts.admin-app')

@section('content')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>维修工单</span></h2>
        {!! Breadcrumbs::render('admin-goods-courier') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">

            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-btns">
                            <a href="" class="panel-close">×</a>
                            <a href="" class="minimize">−</a>
                        </div>
                        <h4 class="panel-title">发货信息</h4>
                    </div>

                    <form class="form-horizontal form-bordered" action="{{ route('admin.goods.courier.update') }}"
                          method="POST">
                        <input type="hidden" value="{{ $order->id }}" name="id">

                        <div class="panel-body panel-body-nopadding">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="checkbox">发货方式</label>
                                <div class="col-sm-6">
                                    <div class="checkbox block">
                                        <label>
                                            <input type="radio" @if(!$courier || $courier->type ==0)checked="checked"
                                                   @endif  name="type" value="0">自取

                                        </label>
                                    </div>
                                    <div class="checkbox block">
                                        <label>
                                            <input type="radio" @if($courier && $courier->type == 1)checked="checked"
                                                   @endif  name="type" value="1">顺丰快递

                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">快递单号 <span class="asterisk">*</span></label>
                                <div class="col-sm-6">
                                    <input type="text" data-toggle="tooltip" name="number"
                                           data-trigger="hover" class="form-control tooltips"
                                           data-original-title="不可重复"
                                           @if($courier)
                                           value="{{ $courier->number }}"
                                            @endif
                                    >
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
