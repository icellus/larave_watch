@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-wrench"></i> 维修工单 <span>工单列表</span></h2>
        {!! Breadcrumbs::render('admin-goods') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">维修工单</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>订单编号</th>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>状态</th>
                                    <th>维修价格</th>
                                    <th>支付状态</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $user)
                                    <tr>
                                        <td>{{$user->uid}}</td>
                                        <td>{{ $user->user->username }}</td>
                                        <td>{{ $user->user->phone }}</td>
                                        <td>
                                            @if($user->status == 0)
                                                <span class="badge badge-info">尚未收货</span>
                                            @elseif($user->status == 1)

                                                <span class="badge badge-info">已收货</span>
                                            @elseif($user->status == 2)

                                                <span class="badge badge-info">待确认</span>
                                            @elseif($user->status == 3)

                                                <span class="badge badge-info">维修中</span>
                                            @elseif($user->status == 4)

                                                <span class="badge badge-info">待付款</span>
                                            @elseif($user->status == 5)
                                                <span class="badge badge-info">已付款</span>
                                            @elseif($user->status == 6)
                                                <span class="badge badge-info">已完成</span>
                                            @elseif($user->status == 7)
                                                <span class="badge">已取消</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{number_format($user->price / 100,2)}}
                                        </td>
                                        <td>
                                            @if(strtotime($user->pay_time) > 0)
                                                <span class="badge badge-info">已支付</span>
                                            @else
                                                <span class="badge">未付款</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.goods.detail',['id'=>$user->id]) }}"
                                               class="btn btn-white btn-xs"><i class="fa fa-pencil"></i>查看详情</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {!! $data->render() !!}

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
