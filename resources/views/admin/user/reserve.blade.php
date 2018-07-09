@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-user"></i> 会员中心 <span>预约记录</span></h2>
        {!! Breadcrumbs::render('admin-users-reserve') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">


            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">预约记录</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        {{--{{dump($data)}}--}}
                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>预约时间</th>
                                    <th>处理时间</th>
                                    <th>当前状态</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $v)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            {{$v->created_at}}
                                        </td>
                                        <td>{{ $v->handle_time }}</td>
                                        <td>
                                            @if($v->status == 0)
                                                <span class="badge">未处理</span>
                                            @else
                                                <span class="badge badge-info">已处理</span>
                                            @endif
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
