@extends('layout.base')

@section('title','test')


@section('page_css')

    <link rel="stylesheet" type="text/css" href="/css/upload.css">
@endsection


@section('content')
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row nav-top">
                <ul class="list-inline">
                    <li><a href="/index">1步故障描述</a></li>
                    <li><a href="/goods" class="newhtader-active">2步手表情况</a></li>
                    <li><a href="/watch">3步联系方式</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->
    <div class="container">
        <div class="row  text-center">
            <p>腕表基本情况</p>
            <p>您的腕表当前基本情况选择，以便我们为您的腕表建立初步电子档案。</p>
        </div>
    </div>


    <div class="container">
        <div class="row question">
            <!--  -->
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="movement">
                    <li>机芯:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">石英机芯</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">机械机芯</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">多功能机芯</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">陀飞轮机芯</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="watch_case">
                    <li>表壳:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">不锈钢</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">18K金</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">千足金</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">钻石</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">其他</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="watch_face">
                    <li>字面:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">普通字面</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">时位钻字面</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">满天星字面</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">多功能字面</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">其他</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="watch_band">
                    <li>表带:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">牛皮</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">鳄鱼皮</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">不锈钢</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">18K金</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">千足金</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">钻石</a></li>
                    <li class="question_but" data-id="6"><a href="javascript:;">塑胶</a></li>
                    <li class="question_but" data-id="7"><a href="javascript:;">陶瓷</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="watch_clasp">
                    <li>表扣:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">不锈钢</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">18K金</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">钻石</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">其他</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline">
                    <li>重量:</li>
                    <li><input type="text" class="form-control" placeholder="总重量多少克" name="height"></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <textarea id="comment" class="form-control" rows="3" placeholder="您可以简单描述手表当前情况说明或注意事项"></textarea>
            </div>

            @include('common.upload')

            <input type="hidden" value="{{session('watch_id')}}" name="id">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="button" class="btn btn-success" id="goodsSubmit"><a href="javascript:;">点击进入下一步</a>
                </button>
            </div>
        </div>

        <div class="container">
            <div class="row down">
            </div>
        </div>
    </div>
@endsection


@section('page_js')
    <script type="text/javascript" src="/js/upload.js?{{time()}}"></script>
@endsection