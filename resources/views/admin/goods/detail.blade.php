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
                                            {{--<span>{{$k}}：</span><span>{{$v}}</span>--}}
                                        </div>
                                    @endforeach
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
                                            {{--<span>{{$k}}：</span><span>{{$v}}</span>--}}
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

                        <br/><br/>

                        <div class="btn-group mr10">
                            <button class="btn btn-primary" type="button"><i class="fa fa-pencil mr5"></i> Edit</button>
                            <button class="btn btn-primary" type="button"><i class="fa fa-comments mr5"></i> Comment
                            </button>
                            <button class="btn btn-primary" type="button"><i class="fa fa-trash-o mr5"></i> Delete
                            </button>
                        </div>

                        <div class="btn-group mr10">
                            <button class="btn btn-default" type="button">Resolve Issue</button>
                            <button class="btn btn-default" type="button">Close Issue</button>
                        </div>

                        <div class="btn-group mr10">
                            <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">
                                More
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Assign</a></li>
                                <li><a href="#">Attach File</a></li>
                                <li><a href="#">Watch Issue</a></li>
                                <li><a href="#">Watchers</a></li>
                                <li><a href="#">Labels</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-success dropdown-toggle" type="button">
                                <i class="fa fa-arrow-circle-o-down mr5"></i> Export
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Word</a></li>
                                <li><a href="#">Text</a></li>
                                <li><a href="#">Spreadsheet</a></li>
                                <li><a href="#">Print</a></li>
                            </ul>
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

    </script>

@endsection
