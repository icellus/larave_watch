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
                        <h5 class="subtitle subtitle-lined">腕表详情</h5>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    @foreach ($watch as $k => $v)
                                        @if(!in_array($k,['id','user_id','order_id','height','province','city','district','area','created_at','updated_at','watch_comment','error_comment']))
                                            @if(!strpos($k,'error'))
                                            <div class="col-xs-6">
                                                <span>{{$k}}：</span><span>{{$v}}</span>
                                            </div>
                                                @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div><!-- col-sm-6 -->
                        </div><!-- row -->

                        <br/><br/>

                        <h5 class="subtitle subtitle-lined">Description</h5>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                            voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                            cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id
                            est laborum et dolorum fuga.</p>
                        <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta
                            nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere
                            possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam
                            et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae
                            sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut
                            reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores
                            repellat.</p>

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
