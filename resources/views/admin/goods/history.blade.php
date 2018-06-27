@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>预约工单</span></h2>
        {!! Breadcrumbs::render('admin-goods-price-history') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">


            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">订单价格修改记录</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        {{--{{dump($data)}}--}}
                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>订单号</th>
                                    <th>原价格</th>
                                    <th>修改后价格</th>
                                    <th>修改备注</th>
                                    <th>修改时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                    <tr>
                                        <td>{{ $order->uid }}</td>
                                        <td>￥{{ number_format($v->present_price / 10 ,2) }}</td>
                                        <td>￥{{ number_format(($v->present_price + $v->change_price)/10,2) }}</td>
                                        <td>{{ $v->comment }}</td>

                                        <td>{{ $v->created_at }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            {!! $data->render() !!}
                        </div>


                    </div><!-- panel-body -->
                </div><!-- panel -->

            </div><!-- col-sm-9 -->

        </div><!-- row -->

    </div>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script type="text/javascript">

    </script>

@endsection
