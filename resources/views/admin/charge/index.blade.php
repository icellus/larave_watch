@extends('layouts.admin-app')

@section('content')

    <div class="pageheader">
        <h2><i class="fa fa-home"></i> Dashboard <span>系统设置</span></h2>
        {!! Breadcrumbs::render('admin-reserve') !!}
    </div>

    <div class="contentpanel panel-email">

        <div class="row">


            <div class="col-sm-12 col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h5 class="subtitle mb5">预约工单</h5>

                        @include('admin._partials.show-page-status',['result'=>$data])

                        {{--{{dump($data)}}--}}
                        <div class="table-responsive col-md-12">
                            <table class="table mb30">
                                <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>手机号</th>
                                    <th>状态</th>
                                    <th>创建时间</th>
                                    <th>处理时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $user)
                                    <tr>
                                        <td>{{ $user->info->username }}</td>
                                        <td>{{ $user->info->phone }}</td>
                                        <td>
                                            @if($user->status == 0)
                                                <span class="badge badge-info">待处理</span>
                                            @else
                                                <span class="badge">已回复</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->handle_time }}</td>
                                        <td>
                                            @if($user->status == 0)
                                                <a href="{{ route('admin.reserve') }}"
                                                   class="btn btn-white btn-xs reserve-handle" data-id="{{$user->id}}"><i class="fa fa-pencil"></i> 标记已处理</a>
                                            @endif
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
        $(".reserve-handle").click(function () {
            Rbac.ajax.request({
                type:'POST',
                href:'/admin/reserve/handle',
                data: {
                    id:$('.reserve-handle').data('id')
                }
            });
        });
    </script>

@endsection
