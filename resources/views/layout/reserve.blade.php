
<!-- 极速预约 -->
<div class="watch-Rapid-booking">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2">
                <div class="media">
                    <div class="media-left media-middle">
                        <img class="media-object" src="/images/booking.png" alt="...">
                    </div>
                    <div class="media-body media-middle font-s16 watch-Rapid-booking-s12">极速预约</div>
                </div>
            </div>
            <form class="bookingform" action="/reserve" >
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <input type="text" name="name" placeholder="姓名 (必填)" datatype="s" nullmsg="请填写姓名" errormsg="请填写正确的姓名" style="width: 120px">
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <input type="text" name="phone" placeholder="手机号 (必填)" datatype="m" nullmsg="请填写手机号码" errormsg="请填写正确的手机号码" style="width: 160px">
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <input type="text" name="captcha" placeholder="验证码" datatype="*" nullmsg="请填写验证码" errormsg="请填写正确的验证码" style="width: 160px;">
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <img src="{{ captcha_src() }}" class="img-responsive" id="img-captcha">
                    {{--<img src="/images/code.png" class="img-responsive">--}}
                </div>
                <div class="col-xs-12 col-sm-2 col-md-2">
                    <div class="watch-Rapid-booking-btn">
                        <a href="javascript:;" class="bookingSubmit">确认预约</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center watch-Rapid-bookings color-ash">客服将在工作时间2小时内与你联系并沟通。</div>
    </div>
</div>
