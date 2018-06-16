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
    <!-- banner -->
    <div class="watch-banner hidden-xs">
        <img src="images/banner.png">
        <div class="watch-banner-spirit">工匠精神 极致服务</div>
        <div class="watch-banner-repair">腕表维修 品质配件 直营保障 一年质保</div>
    </div>
    <!-- 专业团队 -->
    <div class="watch-team padding-mdLR0 hidden-xs">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/icon.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">专业团队</div>
                    <div class="color-ash">原厂品质高级维修</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/qc.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">质检标准</div>
                    <div class="color-ash">杜绝任何遗漏故障</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/character.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">品质配件</div>
                    <div class="color-ash">高品质配件严格检验</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/quality.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">一年质保</div>
                    <div class="color-ash">原故障免费360天</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 reset-width20 text-center">
                    <img src="images/priceTransparency.png" alt="..." class="img-responsive">
                    <div class="font-s16 color-three">价格透明</div>
                    <div class="color-ash">维修费用公示</div>
                </div>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 手表情况头部 -->
    <div class="watch-case">
        <div class="media">
            <div class="media-left media-middle">
                <a href="/errorpage">
                    <img class="media-object" src="images/left.png" alt="...">
                </a>
            </div>
            <div class="media-body media-middle text-center font-s24">
                <span class="color-three">1步手表情况 </span>
                <span>-</span>
                <span class="color-three">2步故障描述</span>
                <span>-</span>
                <span class="color-red">3步联系方式</span>
            </div>
        </div>
    </div>
    <!-- 线条 -->
    <div class="watch-border hidden-xs"></div>
    <!-- 联系方式内容 -->
    <div class="watch-contact-information">
        <div class="text-center font-s16 color-six padding-top15">联系方式</div>
        <div class="text-center color-ash padding-top15 padding-bot45">请详细填写联系地址及联系人快递收货使用</div>
        <div class="container">
            <div class="row">
                <form class="ContactInfoform" method="post" action="/watch">
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="color-seven">姓名：</label>
                        <input type="text" name="name" placeholder="请填写你的姓名" datatype="*" nullmsg="请填写姓名" errormsg="请填写正确的姓名" value="{{session('username')}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="color-seven">手机：</label>
                        <input type="text" name="phone" placeholder="手机号码" datatype="m" nullmsg="请填写手机号码" errormsg="请填写正确的手机号码" value="{{session('phone')}}">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="color-seven">图形验证码：</label>
                        <input type="text" name="captcha" placeholder="图形验证码" datatype="*" nullmsg="请填写验证码" errormsg="请填写正确的验证码">
                        <img src="{{ captcha_src() }}"  class="margin-left100" id="img-captcha">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="color-seven">短信验证：</label>
                        <input type="text" name="noteCode" placeholder="请填写短信验证码" datatype="*" nullmsg="请填写短信验证码" errormsg="请填写正确的短信验证码">
                        <span class="watch-btn-code text-center">
                <a class="margin-left100" href="javascript:;">发送短信验证码</a>
              </span>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="sanjiliandong color-seven">地址：</label>
                        <select class="province" name="province"></select>
                        <select class="city" name="city"></select>
                        <select class="district" name="district"></select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9 padding-top15 col-md-offset-3">
                        <label class="color-seven">详细地址：</label>
                        <input class="contacinfo-last" type="text" name="area" placeholder="详细地址" datatype="*" nullmsg="请填写地址" errormsg="请填写正确的地址">
                    </div>
                    <input type="hidden" value="{{session('watch_id')}}" name="id">
                    <div class="col-xs-12 col-sm-12 col-md-12 watch-btn-next text-center padding-top30 padding-bot45">
                        <a href="/goods" class="ContactInfoSubmit" id="contactForm">提交维修工单</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




@section('page_js')


    <!-- sanjiliandong -->
    <script src="js/jsAddress.js"></script>
    <script type="text/javascript">
        $(function(){
            addressInit('province', 'city', 'district', '', '', '');
            $(".ContactInfoform").Validform({
                btnSubmit:".ContactInfoSubmit",
                ajaxPost: true,
                postonce: true,
                callback: function (data) {
                    $('#img-captcha').attr('src', "http://watch.com/captcha/default?OTF0v3P2" + Math.random())
                }
            });
            $('html').click(function(){
                if ($('#Validform_msg').css('display')=='block') {
                    $('#Validform_msg').css('display','none');
                }
            })
            // 验证码
            var times = 60;
            $('.watch-btn-code a').click(function(){
                if($(this).text()=="发送短信验证码") {
                    var getcode = setInterval(function(){
                        $('.watch-btn-code a').text("发送成功（"+times+"）");
                        times--;
                        if (times==0) {
                            clearInterval(getcode);
                            $('.watch-btn-code a').text("发送短信验证码");
                            times=60;
                        }
                    },1000)
                }
            })

        })
    </script>
@endsection