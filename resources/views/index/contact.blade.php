@extends('layout.base')

@section('title','联系方式')


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
                    <li><a href="/index">1步故障描述</a></li>
                    <li><a href="/goods">2步手表情况</a></li>
                    <li><a href="/watch" class="newhtader-active">3步联系方式</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->
    <div class="container">
        <div class="row text-center">
            <p>填写联系方式</p>
            <p>请认真填写联系地址及联系人快递收取货核对使用。</p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <form class="ContactInfoform" method="post" action="/watch">

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="color-seven">您的姓名：</label>
                    <input type="text" name="name" placeholder="请填姓名" datatype="*" nullmsg="请填写姓名" errormsg="请填写正确的姓名"
                           value="{{session('username')}}">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="color-seven">手机号码：</label>
                    <input type="text" name="phone" placeholder="手机号码" datatype="m" nullmsg="请填写手机号码"
                           errormsg="请填写正确的手机号码" value="{{session('phone')}}">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="color-seven">图形验证：</label>
                    <input type="text" name="captcha" placeholder="图形验证码" datatype="*" nullmsg="请填写验证码"
                           errormsg="请填写正确的验证码">
                    <img src="{{ captcha_src() }}" class="margin-left100" id="img-captcha">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="color-seven">短信验证：</label>
                    <input type="text" name="code" placeholder="短信验证码" datatype="*" nullmsg="请填写短信验证码"
                           errormsg="请填写正确的短信验证码">
                    <span class="watch-btn-code text-center">
                  <a class="margin-left100 SendCode" href="javascript:;">发送验证码</a>
               </span>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="sanjiliandong color-seven">收货地址：</label>
                    <select class="province" name="province"></select>
                    <select class="city" name="city"></select>
                    <select class="district" name="district"></select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                    <label class="color-seven">详细地址：</label>
                    <input class="contacinfo-last" type="text" name="area" placeholder="详细地址" datatype="*"
                           nullmsg="请填写地址" errormsg="请填写正确的地址">
                </div>

                <input type="hidden" value="{{session('watch_id')}}" name="id">
                <div class="col-xs-12 col-sm-12 col-md-12 watch-btn-next text-center padding-top30 padding-bot45">
                    <a href="javascript:;" class="ContactInfoSubmit" id="contactForm">提交维修工单</a>
                </div>

            </form>
        </div>
    </div>

    <div class="container">
        <div class="row down">
        </div>
    </div>

@endsection




@section('page_js')


    <!-- sanjiliandong -->
    <script src="js/jsAddress.js"></script>
    <script type="text/javascript">
        function reloadPage() {
            window.location.href = '/order'
        }
    </script>
    <script type="text/javascript">
        $(function () {
            addressInit('province', 'city', 'district', '', '', '');
            $(".ContactInfoform").Validform({
                btnSubmit: ".ContactInfoSubmit",
                ajaxPost: true,
                postonce: true,
                callback: function (data) {
                    $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())

                    setTimeout('reloadPage()', 300);
                }
            });
            $('html').click(function () {
                if ($('#Validform_msg').css('display') == 'block') {
                    $('#Validform_msg').css('display', 'none');
                }
            })

        })
    </script>
@endsection