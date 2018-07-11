@extends('layout.base')

@section('title','test')


@section('page_css')
@endsection


@section('content')
    <!-- nav -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="row nav-top">
                <ul class="list-inline">
                    <li><a href="#">用户中心</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->
    <div class="container-fluid">
        <div class="row text-center user_face">
            <p><img src="images/logo.png" class="img-circle"></p>
            <p>{{ $user ? $user->phone : '' }}</p>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row text-center user-state">
            <ul class="list-inline">
                <li><a href="/order/0"><img src="images/01icon.png">
                        <p>待维修</p></a></li>
                <li><a href="/order/1"><img src="images/02icon.png">
                        <p>已收货</p></a></li>
                <li><a href="/order/2"><img src="images/03icon.png">
                        <p>待确认</p></a></li>
                <li><a href="/order/3"><img src="images/04icon.png">
                        <p>维修中</p></a></li>
                <li><a href="/order/4"><img src="images/05icon.png">
                        <p>待付款</p></a></li>
                <li><a href="/order/5"><img src="images/06icon.png">
                        <p>已完成</p></a></li>
            </ul>
        </div>
    </div>



    <div class="container">
        <div class="row user_server">
            <ul class="list-unstyled text-center">
                <li><p>博士豪腕表维修服务中心</p></li>
                <li><p>客户服务：17727982233</p></li>
                <li><p>周一至周六（上午9：00 - 下午18：00）</p></li>

                @if(session('user_id') == null)
                    <li>
                        <button type="button" class="btn btn-success"><a href="/logout">退出</a></button>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <ul class="list-unstyled text-center">
                <li><p></p>
                    <p>深圳金济福科技有限公司技术支持</p>
                    <p>李贺龙：13760324350</p></li>
            </ul>
        </div>
    </div>

    <!-- 登录框 -->
    @if(session('user_id') == null)
        <div class="new-login-bg"></div>
        <div class="new-login">
            <div class="new-login-header">
                验证码登录
                <span>X</span>
            </div>
            <div class="new-login-cont">
                <input type="text" name="phone" placeholder="手机号">
                <div class="new-login-code">
                    <input type="text" name="imgcode" placeholder="图形验证">
                    <img src="{{ captcha_src()  }}" id="img-captcha">
                </div>
                <div class="new-login-code">
                    <input type="text" name="code" placeholder="短信验证">
                    <div><a href="javascript:;" class="SendCode">发送验证码</a></div>
                </div>
                <button id="register-button">登录</button>
            </div>
        </div>
    @endif
@endsection




@section('page_js')
    <script type="text/javascript" src="/js/upload.js"></script>
@endsection