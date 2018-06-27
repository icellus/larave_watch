@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>财务统计</span></h2>
        {!! Breadcrumbs::render('admin-order') !!}
    </div>

    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a href="" class="panel-close">&times;</a>
                    <a href="" class="minimize">&minus;</a>
                </div><!-- panel-btns -->
                <h3 class="panel-title">财务账单</h3>
                {{--<p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon--}}
                {{--the foundations of progressive enhancement, which will add advanced interaction controls to any HTML--}}
                {{--table.</p>--}}
            </div>
            <div class="panel-body">
                <h5 class="subtitle mb5">月统计</h5>
                <p class="m20">本月订单数：{{$count}}</p>
                <p class="m20">本月累计收入：￥{{number_format($month / 100,2)}}</p>
                <br/>

                @include('admin._partials.show-page-status',['result'=>$order])
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                        <tr>
                            <th>订单流水号</th>
                            <th>用户名</th>
                            <th>用户手机号</th>
                            <th>价格</th>
                            <th>创建时间</th>
                            <th>完成时间</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order as $v)
                            <tr class="odd gradeX">
                                <td>{{$v->uid}}</td>
                                <td>{{$v->user->username}}
                                </td>
                                <td>{{$v->user->phone}}</td>
                                <td class="center">￥{{number_format($v->price / 100,2)}}</td>
                                <td class="center">{{$v->created_at}}</td>
                                <td class="center">{{$v->finish_time}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $order->render() !!}
                    </div>
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
