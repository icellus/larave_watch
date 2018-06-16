<!-- 底部菜单 -->
<div class="watch-menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                <a href="/index">
                    @if(Request::getRequestUri() == '/index')
                    <img src="/images/Wristwatch2.png">
                    @else
                        <img src="/images/Wristwatch1.png">
                    @endif
                    <div class="font-s18 padding-top8
                     @if(Request::getRequestUri() == '/index')
                            color-green
                        @endif
                    ">腕表维修</div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                <a href="/charge">
                    @if(Request::getRequestUri() == '/charge')
                        <img src="/images/rates2.png">
                    @else
                        <img src="/images/rates.png">
                    @endif

                    <div class="font-s18 color-six padding-top8  @if(Request::getRequestUri() == '/charge')
                            color-green
                        @endif">收费标准</div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 text-center">
                <a href="/order">
                    @if(strpos('/order',Request::getUri()))
                        <img src="/images/guySingle2.png">
                    @else
                        <img src="/images/guySingle.png">
                    @endif
                    <div class="font-s18 color-six padding-top8 @if(strpos('/order',Request::getUri()))
                            color-green
                        @endif">维修工单</div>
                </a>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 text-center right-menu padding-0">
                <a href="javascript:;">
                    @if(in_array(Request::getRequestUri(),['/contactUs','/help']))
                        <img src="/images/customer2.png">
                    @else
                        <img src="/images/customer.png">
                    @endif
                    <div class="font-s18 color-six padding-top8  @if(in_array(Request::getRequestUri(),['/contactUs','/help']))
                            color-green
                        @endif">客户中心</div>
                </a>
                <div class="right-sub-menu">
                    <div class="media">
                        <a href="/contactUs">
                            <div class="media-left media-middle">
                                <img class="media-object" src="/images/contactus.png" alt="...">
                            </div>
                            <div class="media-body media-middle color-six">联系我们</div>
                        </a>
                    </div>
                    <div class="media">
                        <a href="/help">
                            <div class="media-left media-middle">
                                <img class="media-object" src="/images/helpCustomers.png" alt="...">
                            </div>
                            <div class="media-body media-middle color-six">客户帮助</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
