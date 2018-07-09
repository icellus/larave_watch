@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-user"></i> 会员中心 <span>订单记录</span></h2>
        {!! Breadcrumbs::render('admin-users-order') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">


            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">订单记录</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        {{--{{dump($data)}}--}}
                        <br/>
                        <p class="m20">累计成交金额：{{number_format($sum / 100,2)}}</p>
                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>维修价格</th>
                                    <th>维修状态</th>
                                    <th>创建时间</th>
                                    <th>完成时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                    <tr>
                                        <td>{{ $v->uid }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            {{number_format($v->price / 100,2)}}
                                        </td>
                                        <td>
                                            @if($v->status == 0)
                                                <span class="badge badge-info">尚未收货</span>
                                            @elseif($v->status == 1)

                                                <span class="badge badge-info">已收货</span>
                                            @elseif($v->status == 2)

                                                <span class="badge badge-info">待确认</span>
                                            @elseif($v->status == 3)

                                                <span class="badge badge-info">维修中</span>
                                            @elseif($v->status == 4)

                                                <span class="badge badge-info">待付款</span>
                                            @elseif($v->status == 5)
                                                <span class="badge badge-info">已付款</span>
                                            @elseif($v->status == 6)
                                                <span class="badge badge-info">已完成</span>
                                            @elseif($v->status == 7)
                                                <span class="badge">已取消</span>
                                            @endif
                                        </td>
                                        <td>{{ $v->finish_time }}</td>
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
