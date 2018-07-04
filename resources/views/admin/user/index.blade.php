@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-user"></i> 会员中心 <span>会员列表</span></h2>
        {!! Breadcrumbs::render('admin-users') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">


            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">会员中心</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        {{--{{dump($data)}}--}}
                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>消费总金额</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $user)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            ￥{{number_format($user->pay / 100,2)}}
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <a href="{{url('/admin/user/reserve',['id' => $user->id])}}"
                                                   class="btn btn-white btn-xs reserve-handle"><i class="fa"></i> 预约记录</a>
                                            <a href="{{url('/admin/user/order',['id' => $user->id])}}"
                                                   class="btn btn-white btn-xs reserve-handle"><i class="fa"></i> 维修记录</a>

                                        </td>
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
