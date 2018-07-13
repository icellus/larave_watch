@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-th-list"></i> 财务账单 <span>月度统计</span></h2>
        {!! Breadcrumbs::render('admin-order-month') !!}
    </div>

    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{--<div class="panel-btns">--}}
                    {{--<a href="" class="panel-close">&times;</a>--}}
                    {{--<a href="" class="minimize">&minus;</a>--}}
                {{--</div><!-- panel-btns -->--}}
                <h3 class="panel-title">月度统计</h3>
                {{--<p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon--}}
                {{--the foundations of progressive enhancement, which will add advanced interaction controls to any HTML--}}
                {{--table.</p>--}}
            </div>
            <div class="panel-body">

                {{--@include('admin._partials.show-page-status',['result'=>$order])--}}
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                        <tr>
                            <th>月份</th>
                            <th>订单数</th>
                            <th>总收入</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order as $k => $v)
                            <tr class="odd gradeX">
                                <td>{{$k}}</td>
                                <td>{{$v['count']}}</td>
                                <td class="center">￥{{number_format($v['price'] / 100,2)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{--<div class="text-center">--}}
                        {{--{!! $order->render() !!}--}}
                    {{--</div>--}}
                </div><!-- table-responsive -->
                <div class="clearfix mb30"></div>
            </div><!-- panel-body -->
        </div><!-- panel -->

    </div>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">
    </script>

@endsection
