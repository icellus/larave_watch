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
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 联系我们 -->
    <div class="watch-contactus padding-top15 padding-bot15 padding-left20 watch-case">
        <div class="media">
            <div class="media-left media-middle">
                <a href="/">
                    <img class="media-object" src="images/left.png" alt="...">
                </a>
            </div>
            <div class="media-body media-middle font-s18 padding-left20 color-three">客服帮助</div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 内容 -->
    <div class="watch-contactus-cont">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 padding-top15">客服帮助</div>
            </div>
        </div>
    </div>

@endsection


