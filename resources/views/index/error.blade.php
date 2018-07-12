@extends('layout.base')

@section('title','test')


@section('page_css')

    {{--<style type="text/css">
        @media (max-width: 768px){
            body{
                font-family:PingFangSC-Light,helvetica neue,hiragino sans gb,arial,microsoft yahei ui,microsoft yahei,simsun,sans-serif;
                font-size: 14px;
                padding-bottom: 80px;
                padding-top: 50px;
            }
        }
    </style>--}}
@endsection


@section('content')
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row nav-top">
                <ul class="list-inline">
                    <li><a href="/index" class="newhtader-active">1步故障描述</a></li>
                    <li><a href="/goods">2步手表情况</a></li>
                    <li><a href="/watch">3步联系方式</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->
    <div class="container">
        <div class="row text-center">
            <p>腕表故障描述</p>
            <p>腕表当前故障选择，以便快速进入维修。</p>
        </div>
    </div>


    <div class="container">
        <div class="row question">
            <!--  -->
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_movement">
                    <li>机芯:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">换电池</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">停</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">快</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">慢</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">走走停停</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_case">
                    <li>表壳:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">后加钻</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_bezel">
                    <li>表圈:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">后加钻</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_cover">
                    <li>底盖:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_bade">
                    <li>巴的:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_screws">
                    <li>螺丝:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_glass">
                    <li>玻璃:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">更换</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_pin">
                    <li>表针:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_face">
                    <li>字面:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">后加钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_band">
                    <li>表带:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">后加钻</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_clasp">
                    <li>表扣:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">翻新</a></li>
                    <li class="question_but" data-id="2"><a href="javascript:;">补钻</a></li>
                    <li class="question_but" data-id="3"><a href="javascript:;">后加钻</a></li>
                    <li class="question_but" data-id="4"><a href="javascript:;">更换</a></li>
                    <li class="question_but" data-id="5"><a href="javascript:;">定制</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline" id="error_function">
                    <li>功能:</li>
                    <li class="question_but" data-id="1"><a href="javascript:;">不防水了</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <textarea class="form-control" rows="3" placeholder="其他故障问题补充描述" id="error_comment"></textarea>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="new-pick" id="courier">
                    <li>取货:</li>
                    <li class="question_but" data-id="0"><a href="javascript:;">展厅自取</a></li>
                    <li class="question_but" data-id="1"><a href="javascript:;">顺风快递</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <ul class="list-inline">
                    <li>备注:维修费用不包含快递及保价....</li>
                </ul>
            </div>
            <!--  -->
        </div>
        <div class="row text-center">
            <button type="button" class="btn btn-success" id="errorSubmit">
                <a href="javascript:;">点击进入下一步</a>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row down">
        </div>
    </div>
@endsection




@section('page_js')

@endsection